<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\StudentFeePayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFeePaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentFeePayment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'month' => $this->faker->monthName,
            'amount' => $this->faker->randomNumber(0),
            'due' => $this->faker->randomNumber(0),
            'status' => $this->faker->numberBetween(0, 127),
            'payment_method' => $this->faker->text(255),
            'txt_id' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'student_id' => \App\Models\Student::factory(),
            'academic_year_id' => \App\Models\AcademicYear::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
            'section_id' => \App\Models\Section::factory(),
            'fee_type_id' => \App\Models\FeeType::factory(),
        ];
    }
}
