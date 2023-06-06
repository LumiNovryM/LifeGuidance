<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         # Seeder Loop
         $data = [
            ['name' => 'Hitler', 'nip' => '505404', 'email' => 'hitler@gmail.com', 'password' => Hash::make('12345678'),],
        ];

        # Run Seeder Loop
        foreach ($data as $val)
        {
            Guru::insert([
                'name' => $val['name'],
                'nip' => $val['nip'],
                'email' => $val['email'],
                'password' => $val['password'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
