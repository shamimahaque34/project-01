<?php

namespace Database\Factories;

use App\Models\LibraryBook;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibraryBookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LibraryBook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'author_name' => $this->faker->text(255),
            'publisher_name' => $this->faker->text(255),
            'book_code' => $this->faker->text(255),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'quantity' => $this->faker->randomNumber,
            'due_quantity' => $this->faker->randomNumber(0),
            'cover_image' => $this->faker->text(255),
            'self_no' => $this->faker->numberBetween(0, 8388607),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'library_book_category_id' => \App\Models\LibraryBookCategory::factory(),
        ];
    }
}
