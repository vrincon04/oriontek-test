<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'custom_id' => $this->faker->numberBetween(1, 10),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state
        ];
    }
}
