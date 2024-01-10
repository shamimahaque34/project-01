<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LibraryMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibraryMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LibraryMember::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'library_id' => $this->faker->text(255),
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
