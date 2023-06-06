<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login_admin()
    {
        return view('admin.login');
    }

    public function login_admin_action(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            Session::flash('status', 'Error');
            Session::flash('message', 'Error, Coba Lagi');
            return redirect()->route('login_admin');
        }

        Auth::login($user);

        return redirect()->route('tes');
    }

    public function tes()
    {
        return view('tes');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

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
