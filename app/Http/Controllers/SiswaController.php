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
    public function bimbingan_belajar(){
        return view('siswa.bimbingan_belajar', [
            'title' => 'Belajar',
        ]);
    }
    public function list_bimbingan_belajar(){
        return view('siswa.list_bimbingan_belajar', [
            'title' => 'Belajar',
        ]);
    }
    public function create_bimbingan_belajar(){
        return view('siswa.create_bimbingan_belajar', [
            'title' => 'Belajar',
        ]);
    }


    #bimbiangan_pribadi
    public function show_bimbingan_pribadi(){
        return view('siswa.bimbingan_pribadi',[
            'title' => 'Bimbingan Pribadi',
        ]);   
    }

    public function show_list_bimbingan_pribadi(){
        return view('siswa.list_bimbingan_pribadi',[
            'title' => 'Bimbingan Pribadi',
        ]);
    }

    public function show_form_bimbingan_pribadi(){
        return view('siswa.form_bimbingan_pribadi',[
            'title' => 'Bimbingan Pribadi',
        ]);
    }
}
