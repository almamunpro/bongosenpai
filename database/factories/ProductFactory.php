<?php

namespace Database\Factories;
use Illuminate\Support\Str;
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
        'name' => $this->faker->words(2, true),
        'category' => $this->faker->randomElement(['T-Shirt', 'Hoodie', 'Cap', 'Jacket', 'Pants']),
        'description' => $this->faker->sentence(10),
        'price' => $this->faker->randomFloat(2, 10, 100),
        'image' => null, // Or use a default image if needed
    ];
}

}
