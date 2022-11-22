<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
            'title' => fake()->name,
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 2, $max = 3000),
            'stock' => fake()->numberBetween($min = 0, $max = 200),
            'description' => fake()->text($maxNbChars = 600) ,
            'discount' => fake()->numberBetween($min = 0, $max = 100),
            'user_id' => User::inRandomOrder()->first(),
            'category_id' => Category::inRandomOrder()->first(),
        ];
    }
}
