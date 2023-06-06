<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use AuthSeeder;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            GuruSeeder::class,
        ]);
        User::create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}