<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_name' => fake()->name(),
            'item_description' => fake()->sentence(),
            'item_price' => fake()->numberBetween(1,50),
            'item_image' => 'image.jpg',
        ];
    }
}
