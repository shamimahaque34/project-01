<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ExamQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExamQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => $this->faker->randomNumber,
            'academic_class_id' => \App\Models\AcademicClass::factory(),
            'section_id' => \App\Models\Section::factory(),
            'student_group_id' => \App\Models\StudentGroup::factory(),
            'subject_id' => \App\Models\Subject::factory(),
            'exam_id' => \App\Models\Exam::factory(),
            'academic_year_id' => \App\Models\AcademicYear::factory(),
        ];
    }
}
