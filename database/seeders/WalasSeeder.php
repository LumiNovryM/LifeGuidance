<?php

namespace Database\Seeders;

use App\Models\Walas;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Seeder Loop
        $data = [
            ['name' => 'John Wick', 'nip' => '505404', 'email' => 'johnwick@gmail.com', 'role_id' => 4, 'password' => Hash::make('12345678'),],
        ];

        # Run Seeder Loop
        foreach ($data as $val) {
            Walas::insert([
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
