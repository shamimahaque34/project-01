<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExamMarkDistributionType;

class ExamMarkDistributionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamMarkDistributionType::factory()
            ->count(5)
            ->create();
    }
}
