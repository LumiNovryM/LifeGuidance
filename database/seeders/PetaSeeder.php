<?php

namespace Database\Seeders;

use App\Models\Peta_Kerawanan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Seeder Loop
        $data = [
            [
            'siswa_id' => 1,
            'guru_id' => 1, 
            'walas_id' => 1,
            'kelas_id' => 1,
            'sering_sakit' => 0,
            'sering_izin' => 0,
            'sering_alpha' => 0,
            'sering_terlambat' => 0,
            'bolos' => 1,
            'kelainan_jasmani' => 1,
            'minat_belajar_kurang' => 1,
            'introvert' => 1,
            'tinggal_dengan_wali' => 1,
            'kemampuan_kurang' => 1
        ],
        ];

        # Run Seeder Loop
        foreach ($data as $val) {
            Peta_Kerawanan::insert([
                'siswa_id' => $val['siswa_id'],
                'guru_id' => $val['guru_id'],
                'walas_id' => $val['walas_id'],
                'kelas_id' => $val['kelas_id'],
                'sering_sakit' => $val['sering_sakit'],
                'sering_izin' => $val['sering_izin'],
                'sering_alpha' => $val['sering_alpha'],
                'sering_terlambat' => $val['sering_terlambat'],
                'bolos' => $val['bolos'],
                'kelainan_jasmani' => $val['kelainan_jasmani'],
                'minat_belajar_kurang' => $val['minat_belajar_kurang'],
                'introvert' => $val['introvert'],
                'sering_sakit' => $val['sering_sakit'],
                'tinggal_dengan_wali' => $val['tinggal_dengan_wali'],
                'kemampuan_kurang' => $val['kemampuan_kurang'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
