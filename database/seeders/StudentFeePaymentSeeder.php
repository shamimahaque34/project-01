<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentFeePayment;

class StudentFeePaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentFeePayment::factory()
            ->count(5)
            ->create();
    }
}
