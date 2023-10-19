<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id'=> fake()->numberBetween(1,50),
            'address'=> fake()->address,
            'coordinates'=> fake()->latitude($min = -90, $max = 90).', ' . fake() ->longitude($min = -180, $max = 180)
        ];
    }
}
