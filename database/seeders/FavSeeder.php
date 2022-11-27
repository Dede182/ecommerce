<?php

namespace Database\Seeders;

use App\Models\Fav;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $user){
            Fav::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
