<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' =>$this->faker->sentence,
            'price' => $this->faker->randomFloat(2,1,50),
            'imageUrl' => $this->faker->url,
            'category' =>$this->faker->name,
        ];
    }
}
