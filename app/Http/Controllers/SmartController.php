<?php

namespace App\Http\Controllers;

use App\Models\CriteriaModel;
use App\Models\ResultModel;
use App\Models\ScoreModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class SmartController extends Controller
{
    public function calculate()
    {
        // Kosongkan hasil sebelumnya
        ResultModel::truncate();

        $students = StudentModel::with('scores')->get();
        $criteria = CriteriaModel::all();

        // Ambil nilai maksimum untuk normalisasi (per kriteria)
        $normalizationData = [];

        foreach ($criteria as $c) {
            $values = ScoreModel::where('criteria_id', $c->id)->pluck('value');
            $normalizationData[$c->id] = [
                'max' => $values->max(),
                'min' => $values->min(),
                'type' => $c->type,
                'weight' => $c->weight,
            ];
        }

        // Proses setiap siswa
        foreach ($students as $student) {
            $totalScore = 0;

            foreach ($student->scores as $score) {
                $c = $normalizationData[$score->criteria_id];

                // Normalisasi
                if ($c['type'] === 'benefit') {
                    $normalized = $score->value / $c['max'];
                } else {
                    $normalized = $c['min'] / $score->value;
                }

                // Hitung skor tertimbang
                $totalScore += $normalized * $c['weight'];
            }

            // Simpan hasil
            ResultModel::create([
                'student_id' => $student->id,
                'final_score' => $totalScore,
            ]);
        }

        // Update peringkat
        $ranked = ResultModel::orderByDesc('final_score')->get();
        $rank = 1;
        foreach ($ranked as $res) {
            $res->update(['rank' => $rank++]);
        }

        return response()->json([
            'message' => 'Perhitungan SMART selesai',
            'results' => ResultModel::with('student')->orderBy('rank')->get()
        ]);
    }
}
