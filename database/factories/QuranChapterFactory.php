<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\QuranChapter;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuranChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuranChapter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'arabic_name' => $this->faker->name,
            'bangla_name' => $this->faker->name,
            'english_name' => $this->faker->name,
            'chapter_serial' => $this->faker->text(255),
            'total_verse' => $this->faker->text(255),
            'surah_origin' => $this->faker->numberBetween(0,1),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
