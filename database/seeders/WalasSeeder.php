<?php

namespace Database\Seeders;

use App\Models\Walas;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class WalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        # Seeder Loop
        $data = [
            ['name' => 'John Wick','no_telp' => '081244542479' , 'kelas_id' => 1,'nip' => '598106125854791086', 'email' => 'johnwick@gmail.com', 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 2,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 3,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 4,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 5,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 6,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 7,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 8,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 9,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 10,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 11,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 12,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 13,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 14,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 15,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 16,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 17,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 18,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 19,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 20,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 21,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 22,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 23,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
            ['name' => $faker->unique()->name(),'no_telp' => '081244542479' , 'kelas_id' => 24,'nip' => '598106125854791086', 'email' => $faker->unique()->email(), 'role_id' => 4, 'password' => Hash::make('12345678'),],
        ];

        # Run Seeder Only For Demo Acc
        foreach ($data as $val) {
            Walas::insert([
                'name' => $val['name'],
                'no_telp' => $val['no_telp'],
                'kelas_id' => $val['kelas_id'],
                'nip' => $val['nip'],
                'email' => $val['email'],
                'role_id' => $val['role_id'],
                'password' => $val['password'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
