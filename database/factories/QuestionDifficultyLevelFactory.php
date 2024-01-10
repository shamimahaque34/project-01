<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\QuestionDifficultyLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionDifficultyLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuestionDifficultyLevel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
