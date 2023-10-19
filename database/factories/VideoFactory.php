<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'name' => $this->faker->sentence,
            'message' => $this->faker->sentence,
            'video_path' => $this->faker->sentence,
            'category_id'=>$this->faker->numberBetween(1,4),
            'user_id'=> $this->faker->numberBetween(1,50)
        ];
    }
}