<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionBankAnswerOption;

class QuestionBankAnswerOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionBankAnswerOption::factory()
            ->count(5)
            ->create();
    }
}
