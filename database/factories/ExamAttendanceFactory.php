<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ExamAttendance;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamAttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExamAttendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'is_present____1_present_0_absent' => $this->faker->numberBetween(
                0,
                127
            ),
            'exam_id' => \App\Models\Exam::factory(),
            'exam_schedule_id' => \App\Models\ExamSchedule::factory(),
            'student_id' => \App\Models\Student::factory(),
            'section_id' => \App\Models\Section::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
        ];
    }
}
