<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section_id' => $this->faker->randomNumber,
            'month' => $this->faker->monthName,
            'date' => $this->faker->date,
            'academic_year_id' => \App\Models\AcademicYear::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
            'attendanceable_type' => $this->faker->randomElement([
                \App\Models\Student::class,
                \App\Models\Teacher::class,
                \App\Models\AcademicStuff::class,
            ]),
            'attendanceable_id' => function (array $item) {
                return app($item['attendanceable_type'])->factory();
            },
        ];
    }
}
