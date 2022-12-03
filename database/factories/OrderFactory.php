<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'deliveryOption' => fake()->randomElement(['Standard Delivery Option']),
           'payment' => fake()->randomElement(['COD','Paypal']),
           'user_id' => User::inRandomOrder()->first(),
           'admin_id' => User::where('role','admin')->first(),
           'code' => fake()->numerify("########"),
           'total' => fake()->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 20000),
            'status' => fake()->randomElement(['Pending','Delivered','Cancelled'])
        ];
    }
}
