<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ExamSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExamSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_date' => $this->faker->date,
            'start_time' => $this->faker->text(255),
            'end_time' => $this->faker->text(255),
            'room' => $this->faker->text(255),
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'exam_id' => \App\Models\Exam::factory(),
            'section_id' => \App\Models\Section::factory(),
            'subject_id' => \App\Models\Subject::factory(),
            'academic_year_id' => \App\Models\AcademicYear::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
        ];
    }
}
