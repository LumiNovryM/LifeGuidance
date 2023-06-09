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
            # X
            ['name' => 'X PPLG 1'],
            ['name' => 'X PPLG 2'],
            ['name' => 'X MM 1'],
            ['name' => 'X MM 2'],
            ['name' => 'X TKJT 1'],
            ['name' => 'X TKJT 2'],
            ['name' => 'X TE'],
            ['name' => 'X BC'],
            # XI 
            ['name' => 'XI PPLG 1'],
            ['name' => 'XI PPLG 2'],
            ['name' => 'XI MM 1'],
            ['name' => 'XI MM 2'],
            ['name' => 'XI TKJT 1'],
            ['name' => 'XI TKJT 2'],
            ['name' => 'XI TE'],
            ['name' => 'XI BC'],
            # XII  
            ['name' => 'XII PPLG 1'],
            ['name' => 'XII PPLG 2'],
            ['name' => 'XII MM 1'],
            ['name' => 'XII MM 2'],
            ['name' => 'XII TKJT 1'],
            ['name' => 'XII TKJT 2'],
            ['name' => 'XII TE'],
            ['name' => 'XII BC'],
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
