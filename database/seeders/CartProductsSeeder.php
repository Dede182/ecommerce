<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\CartProducts;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CartProducts::factory(10)->create();
    }
}
