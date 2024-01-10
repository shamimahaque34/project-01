<?php

namespace Database\Factories;

use App\Models\Routine;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoutineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Routine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day' => $this->faker->text(255),
            'room' => $this->faker->text(255),
            'note' => $this->faker->text,
            'status' => $this->faker->numberBetween(0, 127),
            'teacher_id' => \App\Models\Teacher::factory(),
            'section_id' => \App\Models\Section::factory(),
            'subject_id' => \App\Models\Subject::factory(),
            'class_schedule_id' => \App\Models\ClassSchedule::factory(),
            'academic_year_id' => \App\Models\AcademicYear::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
        ];
    }
}
