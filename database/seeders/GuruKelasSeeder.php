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
            # X
            ['guru_id' => 1, 'kelas_id' => 1,],
            ['guru_id' => 1, 'kelas_id' => 2,],
            ['guru_id' => 1, 'kelas_id' => 3,],
            ['guru_id' => 1, 'kelas_id' => 4,],
            ['guru_id' => 1, 'kelas_id' => 5,],
            ['guru_id' => 1, 'kelas_id' => 6,],
            ['guru_id' => 1, 'kelas_id' => 7,],
            ['guru_id' => 1, 'kelas_id' => 8,],
            # XI 
            ['guru_id' => 2, 'kelas_id' => 9,],
            ['guru_id' => 2, 'kelas_id' => 10,],
            ['guru_id' => 2, 'kelas_id' => 11,],
            ['guru_id' => 2, 'kelas_id' => 12,],
            ['guru_id' => 2, 'kelas_id' => 13,],
            ['guru_id' => 2, 'kelas_id' => 14,],
            ['guru_id' => 2, 'kelas_id' => 15,],
            ['guru_id' => 2, 'kelas_id' => 16,],
            # XII
            ['guru_id' => 3, 'kelas_id' => 17,],
            ['guru_id' => 3, 'kelas_id' => 18,],
            ['guru_id' => 3, 'kelas_id' => 19,],
            ['guru_id' => 3, 'kelas_id' => 20,],
            ['guru_id' => 3, 'kelas_id' => 21,],
            ['guru_id' => 3, 'kelas_id' => 22,],
            ['guru_id' => 3, 'kelas_id' => 23,],
            ['guru_id' => 3, 'kelas_id' => 24,],
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
