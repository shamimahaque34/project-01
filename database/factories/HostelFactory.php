<?php

namespace Database\Factories;

use App\Models\Hostel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hostel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hostel_name' => $this->faker->text(255),
            'hostel_type' => 'Boys',
            'address' => $this->faker->text,
            'fee' => $this->faker->randomNumber(0),
            'class_type' => $this->faker->text(255),
            'total_floor' => $this->faker->numberBetween(0, 8388607),
            'total_rooms' => $this->faker->randomNumber(0),
            'seat_per_room' => $this->faker->numberBetween(0, 8388607),
            'note' => $this->faker->text,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
