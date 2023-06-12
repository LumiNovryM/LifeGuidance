<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
         # Seeder Loop
         $data = [
            ['name' => $faker->name, 'kelas_id' => 1, 'nisn' => '20229232', 'email' => $faker->email(), 'role_id' => 1, 'password' => Hash::make('12345678'),],
            ['name' => $faker->name, 'kelas_id' => 1, 'nisn' => '20229233', 'email' => $faker->email(), 'role_id' => 1, 'password' => Hash::make('12345678'),],
            ['name' => $faker->name, 'kelas_id' => 1, 'nisn' => '20229233', 'email' => $faker->email(), 'role_id' => 1, 'password' => Hash::make('12345678'),],
        ];

        # Run Seeder Loop
        foreach ($data as $val) {
            Siswa::insert([
                'name' => $val['name'],
                'kelas_id' => $val['kelas_id'],
                'nisn' => $val['nisn'],
                'email' => $val['email'],
                'role_id' => $val['role_id'],
                'password' => $val['password'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
