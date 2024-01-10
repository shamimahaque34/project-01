<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssociateExamQuestion;

class AssociateExamQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssociateExamQuestion::factory()
            ->count(5)
            ->create();
    }
}
