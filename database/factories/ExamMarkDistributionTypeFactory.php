<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ExamMarkDistributionType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamMarkDistributionTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExamMarkDistributionType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'distribution_type' => $this->faker->text(255),
            'mark_value' => $this->faker->numberBetween(0, 8388607),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
