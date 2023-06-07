<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Solokov'],
        ];

        # Run Seeder Loop
        foreach ($data as $val) {
            Kelas::insert([
                'name' => $val['name'],
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
