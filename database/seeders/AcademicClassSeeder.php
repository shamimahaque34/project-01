<?php

namespace Database\Seeders;

use App\Models\AcademicClass;
use Illuminate\Database\Seeder;

class AcademicClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicClass::factory()
            ->count(5)
            ->create();
    }
}
