<?php

namespace Database\Seeders;

use App\Models\ExamQuestion;
use Illuminate\Database\Seeder;

class ExamQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamQuestion::factory()
            ->count(5)
            ->create();
    }
}
