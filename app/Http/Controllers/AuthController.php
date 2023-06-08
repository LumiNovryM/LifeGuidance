<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    # Login Handler For Admin
    public function login_admin()
    {
        return view('admin.login');
    }

    public function login_admin_action(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            Session::flash('status', 'Error');
            Session::flash('message', 'Invalid Login. Try Again');
            return redirect()->route('login_admin');
        }
        # Remember Me 
        if ($request->remember === "on") {
            setcookie("email", $request->email);
        } else {
            setcookie("email", "");
        }

        Auth::login($user);

        return redirect()->route('home_admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    # Login Handler For Guru
    public function login_guru()
    {
        return view('guru.login');
    }

    public function login_guru_action(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = Guru::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            Session::flash('status', 'Error');
            Session::flash('message', 'Invalid Login. Try Again');
            return redirect()->route('login_guru');
        }
        # Remember Me 
        if ($request->remember === "on") {
            setcookie("email", $request->email);
        } else {
            setcookie("email", "");
        }

        Auth::login($user);

        return redirect()->route('home_guru');
    }


    # Login Page For Siswa
    public function login_siswa()
    {
        return view('siswa.login');
    }

    # Login Page For Guru BK
    public function login_walas()
    {
        return view('walas.login');
    }

    public function login_walas_action(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = Walas::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            Session::flash('status', 'Error');
            Session::flash('message', 'Invalid Login. Try Again');
            return redirect()->route('login_walas');
        }
        # Remember Me 
        if ($request->remember === "on") {
            setcookie("email", $request->email);
        } else {
            setcookie("email", "");
        }

        Auth::login($user);

        return redirect()->route('home_walas');
    }

    public function login_siswa_action(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = Siswa::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            Session::flash('status', 'Error');
            Session::flash('message', 'Invalid Login. Try Again');
            return redirect()->route('login_siswa');
        }
        # Remember Me 
        if ($request->remember === "on") {
            setcookie("email", $request->email);
        } else {
            setcookie("email", "");
        }

        Auth::login($user);

        return redirect()->route('home_siswa');
    }
}
