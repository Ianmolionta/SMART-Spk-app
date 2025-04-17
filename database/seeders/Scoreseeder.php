<?php

namespace Database\Seeders;

use App\Models\CriteriaModel;
use App\Models\ScoreModel;
use App\Models\StudentModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Scoreseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = StudentModel::all();
        $criteria = CriteriaModel::all();

        foreach ($students as $student) {
            foreach ($criteria as $criterion) {
                ScoreModel::create([
                    'student_id' => $student->id,
                    'criteria_id' => $criterion->id,
                    'value' => rand(60, 100), // Nilai acak antara 60–100
                ]);
            }
        }
    }
}
