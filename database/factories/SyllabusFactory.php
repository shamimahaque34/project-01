<?php

namespace Database\Factories;

use App\Models\Syllabus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SyllabusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Syllabus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'file_type' => $this->faker->text(255),
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'subject_id' => \App\Models\Subject::factory(),
            'academic_year_id' => \App\Models\AcademicYear::factory(),
        ];
    }
}
