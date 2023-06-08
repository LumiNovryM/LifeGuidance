<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        # Seeder Loop
        $data = [
            ['name' => 'Admin', 'nip' => '404505', 'email' => 'admin@admin.com', 'role_id' => 1, 'password' => Hash::make('12345678'),],
            ['name' => 'admin1', 'nip' => '505404', 'email' => 'admin1@gmail.com', 'role_id' => 1, 'password' => Hash::make('12345678'),],
        ];

        # Run Seeder Loop
        foreach ($data as $val) {
            User::insert([
                'name' => $val['name'],
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
