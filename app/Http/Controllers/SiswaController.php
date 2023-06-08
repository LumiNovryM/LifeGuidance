<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function home_siswa(){
        return view('siswa.siswa', [
            'title' => 'Dashboard',
        ]);
    }
}
