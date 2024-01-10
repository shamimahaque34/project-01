<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\QuestionBankAnswerOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionBankAnswerOptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuestionBankAnswerOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'option_name' => $this->faker->text(255),
            'option_img' => $this->faker->text,
            'is_correct' => $this->faker->numberBetween(0, 127),
            'question_id' => \App\Models\Question::factory(),
        ];
    }
}
