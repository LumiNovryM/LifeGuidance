<?php

namespace Database\Seeders;

use App\Models\GuruKelas;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Seeder Loop
        $data = [
            ['guru_id' => 1, 'kelas_id' => 1,],
        ];

        # Run Seeder Loop
        foreach ($data as $val) {
            GuruKelas::insert([
                'guru_id' => $val['guru_id'],
                'kelas_id' => $val['kelas_id'],
            ]);
        }
    }
}
