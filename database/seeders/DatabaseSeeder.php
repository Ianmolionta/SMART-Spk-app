<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('scores')->delete();
        DB::table('students')->delete();
        DB::table('criteria')->delete();
    
        $this->call([
            StudentSeeder::class,
            CriteriaSeeder::class,
            ScoreSeeder::class,
        ]);
    }
}
