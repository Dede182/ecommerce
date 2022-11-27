<?php

namespace Database\Factories;

use App\Models\Fav;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favitem>
 */
class FavitemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fav_id' => Fav::inRandomOrder()->first(),
            'product_id' => Product::inRandomOrder()->first()
        ];
    }
}
