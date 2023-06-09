<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         # Seeder Loop
         $data = [
            ['name' => 'Solokov', 'kelas_id' => 1, 'nisn' => '20229232', 'email' => 'solokov@gmail.com', 'role_id' => 2, 'password' => Hash::make('12345678'),],
            ['name' => 'Ujang', 'kelas_id' => 1, 'nisn' => '20229233', 'email' => 'udin@gmail.com', 'role_id' => 2, 'password' => Hash::make('12345678'),],
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
