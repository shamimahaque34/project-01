<?php

namespace Database\Factories;

use App\Models\ExamMark;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamMarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExamMark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mark' => $this->faker->numberBetween(0, 8388607),
            'section_id' => \App\Models\Section::factory(),
            'exam_id' => \App\Models\Exam::factory(),
            'student_id' => \App\Models\Student::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
        ];
    }
}
