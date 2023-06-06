<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    # Login Page For Walas
    public function login_walas()
    {
        return view('walas.login');
    }

    # Login Page For Siswa
    public function login_siswa()
    {
        return view('siswa.login');
    }

    # Login Page For Guru BK
    public function login_guru()
    {
        return view('guru.login');
    }
}
