<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'hhz',
            'email' => 'hhz@gmail.com',
            'address' => 'Insein',
            'role' => 'admin',
            'password' => Hash::make('asdffdsa')
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class
        ]);
        $file = new FileSystem;
        $file->cleanDirectory('storage/app/public/');

        echo "\e[93mStorage Cleaned \n";
    }
}
