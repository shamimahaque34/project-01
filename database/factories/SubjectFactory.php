<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Subject_name' => $this->faker->text(255),
            'subject_type__optional_mandatory' => $this->faker->text(255),
            'pass_mark' => $this->faker->randomNumber(0),
            'final_mark' => $this->faker->randomNumber(0),
            'point' => $this->faker->numberBetween(0, 32767),
            'Subject_author' => $this->faker->text(255),
            'Subject_code' => $this->faker->text(255),
            'Subject_book_image' => $this->faker->text,
            'Is_for_graduation' => $this->faker->numberBetween(0, 127),
            'is_main_subject' => $this->faker->numberBetween(0, 127),
            'Is_optional' => $this->faker->numberBetween(0, 127),
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'updated_by' => \App\Models\User::factory(),
            'educational_stage_id' => \App\Models\EducationalStage::factory(),
            'student_group_id' => \App\Models\StudentGroup::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
        ];
    }
}
