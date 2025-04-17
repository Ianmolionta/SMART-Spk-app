<?php

namespace Database\Seeders;

use App\Models\CriteriaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteria = [
            ['name' => 'Nilai Akademik', 'weight' => 0.4, 'type' => 'benefit'],
            ['name' => 'Kehadiran', 'weight' => 0.2, 'type' => 'benefit'],
            ['name' => 'Sikap & Etika', 'weight' => 0.2, 'type' => 'benefit'],
            ['name' => 'Prestasi Non-Akademik', 'weight' => 0.2, 'type' => 'benefit'],
        ];

        foreach ($criteria as $item) {
            CriteriaModel::create($item);
        }
    }
}
