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
            # X PPLG 1
            ['name' => "Udin", 'kelas_id' => 1, 'nisn' => '20229233', 'email' => 'udin@gmail.com', 'role_id' => 2, 'password' => Hash::make('12345678'),],
        ];

        # Run Seeder Only For Demo Acc
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

        # X PPLG 1
        $target = 40;
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 1,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # X PPLG 2
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 2,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # X MM 1
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 3,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # X MM 2
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 4,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # X TKJT 1
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 5,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # X TKJT 2
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 6,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # X TE
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 7,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # X BC
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 8,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XI PPLG 1
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 9,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XI PPLG 2
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 10,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XI MM 1
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 11,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XI MM 2
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 12,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XI TKJT 1
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 13,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XI TKJT 2
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 14,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XI TE
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 15,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XI BC
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 16,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XII PPLG 1
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 17,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XII PPLG 2
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 18,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XII MM 1
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 19,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XII MM 2
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 20,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XII TJKT 1
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 21,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XII TJKT 2
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 22,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XII TE
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 23,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        # XII BC
        for($i=0;$i<$target;$i++){
            Siswa::insert([
                'name' => $faker->name(),
                'kelas_id' => 24,
                'nisn' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->email(),
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

    }
}
