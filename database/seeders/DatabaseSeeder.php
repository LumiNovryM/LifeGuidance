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
            KelasSeeder::class,
            WalasSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
        ]);
    }
}