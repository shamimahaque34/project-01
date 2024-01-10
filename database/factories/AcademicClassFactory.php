<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\AcademicClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AcademicClass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_name' => $this->faker->text(255),
            'class_numeric' => $this->faker->unique->text(255),
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'educational_stage_id' => \App\Models\EducationalStage::factory(),
        ];
    }
}
