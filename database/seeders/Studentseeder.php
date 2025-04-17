<?php

namespace Database\Seeders;

use App\Models\StudentModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['name' => 'Alya Rahma', 'student_number' => 'S001', 'class' => 'X IPA 1'],
            ['name' => 'Budi Santoso', 'student_number' => 'S002', 'class' => 'X IPA 1'],
            ['name' => 'Citra Dewi', 'student_number' => 'S003', 'class' => 'X IPA 2'],
            ['name' => 'Dimas Pratama', 'student_number' => 'S004', 'class' => 'X IPA 2'],
        ];

        foreach ($students as $student) {
            StudentModel::create($student);
        }
    }
}
