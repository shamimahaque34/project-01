<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionDifficultyLevel;

class QuestionDifficultyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionDifficultyLevel::factory()
            ->count(5)
            ->create();
    }
}
