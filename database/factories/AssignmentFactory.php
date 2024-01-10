<?php

namespace Database\Factories;

use App\Models\Assignment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignment::class;

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
            'deadline' => $this->faker->text(255),
            'deadline_timestamp' => $this->faker->dateTime,
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'subject_id' => \App\Models\Subject::factory(),
            'section_id' => \App\Models\Section::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
        ];
    }
}
