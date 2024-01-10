<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LibraryEbookFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibraryEbookFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LibraryEbookFile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_url' => $this->faker->text(255),
            'file_type' => $this->faker->text(255),
            'library_ebook_id' => \App\Models\LibraryEbook::factory(),
        ];
    }
}
