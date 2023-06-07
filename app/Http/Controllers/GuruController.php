<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function home_guru(){
        return view('guru.guru',[
            "title" => "Dashboard"
        ]);
    }

    public function show_kelas(){
        return view('guru.kelas',[
            "title" => "Kelas"
        ]);
    }

    public function show_siswa(){
        return view('guru.kelas',[
            "title" => "Siswa"
        ]);
    }
}
