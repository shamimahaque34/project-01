<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->text,
            'explanation' => $this->faker->text,
            'question_img' => $this->faker->text(255),
            'mark' => $this->faker->numberBetween(0, 8388607),
            'hints' => $this->faker->text,
            'question_answer_type ______1=>mcq_2=>fill_in_the_blanks_3=>brod_que_ans' => $this->faker->numberBetween(
                0,
                32767
            ),
            'total_options' => $this->faker->numberBetween(0, 8388607),
            'slug' => $this->faker->text,
            'status' => $this->faker->numberBetween(0, 127),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
            'subject_id' => \App\Models\Subject::factory(),
            'question_difficulty_level_id' => \App\Models\QuestionDifficultyLevel::factory(),
        ];
    }
}
