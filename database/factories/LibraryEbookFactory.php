<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LibraryEbook;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibraryEbookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LibraryEbook::class;

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
            'book_code' => $this->faker->text(255),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'cover_image' => $this->faker->text(255),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'library_book_category_id' => \App\Models\LibraryBookCategory::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
        ];
    }
}
