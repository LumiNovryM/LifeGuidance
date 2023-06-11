<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        # Seeder Loop
        $data = [
            ['name' => 'Kasandra Fitriani Nurjanah S.Pd','motto' => 'Temukan kekuatan dalam dirimu' ,'nip' => '598106125854791086', 'email' => 'kasandra@gmail.com', 'role_id' => 3, 'password' => Hash::make('12345678'),],
            ['name' => 'Ricky Sudrajat S.Pd','motto' => 'Jadilah yang terbaik versi dirimu' , 'nip' => '598106125854791086', 'email' => 'ricky@gmail.com', 'role_id' => 3, 'password' => Hash::make('12345678'),],
            ['name' => 'Heni Siswanti S.Psi','motto' => 'Tetaplah percaya pada dirimu sendiri', 'nip' => '598106125854791086', 'email' => 'heni@gmail.com', 'role_id' => 3, 'password' => Hash::make('12345678'),],
        ];

        # Run Seeder Loop
        foreach ($data as $val) {
            Guru::insert([
                'name' => $val['name'],
                'motto' => $val['motto'],
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
