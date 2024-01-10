<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LibraryBookCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibraryBookCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LibraryBookCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
