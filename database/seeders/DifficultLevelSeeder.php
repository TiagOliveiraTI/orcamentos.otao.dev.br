<?php

namespace Database\Seeders;

use App\Models\DifficultLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DifficultLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DifficultLevel::factory(3)->create();
    }
}
