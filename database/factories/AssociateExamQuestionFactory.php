<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\AssociateExamQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssociateExamQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssociateExamQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_question_id' => \App\Models\ExamQuestion::factory(),
            'question_id' => \App\Models\Question::factory(),
        ];
    }
}
