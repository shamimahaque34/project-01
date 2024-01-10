<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\HostelMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostelMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HostelMember::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bostel_balance' => $this->faker->randomNumber(0),
            'jod' => $this->faker->date,
            'user_id' => \App\Models\User::factory(),
            'student_id' => \App\Models\Student::factory(),
            'teacher_id' => \App\Models\Teacher::factory(),
            'hostel_id' => \App\Models\Hostel::factory(),
        ];
    }
}
