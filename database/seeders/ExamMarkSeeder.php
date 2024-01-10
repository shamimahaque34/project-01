<?php

namespace Database\Seeders;

use App\Models\ExamMark;
use Illuminate\Database\Seeder;

class ExamMarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamMark::factory()
            ->count(5)
            ->create();
    }
}
