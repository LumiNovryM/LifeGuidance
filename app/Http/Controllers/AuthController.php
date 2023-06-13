<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
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

        return redirect()->route('home_admin')->with('message', 'Berhasil login!');
    }

    # Login Handler For Guru
    public function login_guru()
    {
        return view('guru.login');
    }

    public function login_guru_action(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // cookies
        if (Auth::guard('guru')->attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->remember === "on") {
                setcookie("email", $request->email);
            } else {
                setcookie("email", "");
            }

            return redirect()->route('home_guru')->with('message', 'Berhasil login!');
        }

        Session::flash('status', 'Error');
        Session::flash('message', 'Invalid Login. Try Again');
        return redirect()->route('login_guru');
    }


    # Login Page For Siswa
    public function login_siswa()
    {
        return view('siswa.login');
    }

    public function login_siswa_action(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->remember === "on") {
                setcookie("email", $request->email);
            } else {
                setcookie("email", "");
            }

            return redirect()->route('home_siswa')->with('message', 'Berhasil login!');
        }

        Session::flash('status', 'Error');
        Session::flash('message', 'Invalid Login. Try Again');
        return redirect()->route('login_siswa');
    }

    # Login Page For Guru BK
    public function login_walas()
    {
        return view('walas.login');
    }

    public function login_walas_action(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('walas')->attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->remember === "on") {
                setcookie("email", $request->email);
            } else {
                setcookie("email", "");
            }

            return redirect()->route('home_walas')->with('message', 'Berhasil login!');
        }

        Session::flash('status', 'Error');
        Session::flash('message', 'Invalid Login. Try Again');
        return redirect()->route('login_walas');
    }

    public function logout_admin(Request $request)
    {
        $userId = Auth::id();
        Cache::forget('user-is-online-'.$userId);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Berhasil Logout');
    }

    public function logout_guru(Request $request)
    {
        $userId = Auth::guard('guru')->id();
        Cache::forget('user-is-online-'.$userId);
        Auth::guard('guru')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Berhasil Logout');
    }

    public function logout_siswa(Request $request)
    {
        $userId = Auth::guard('siswa')->id();
        Cache::forget('user-is-online-'.$userId);
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Berhasil Logout');
    }
    public function logout_walas(Request $request)
    {
        $userId = Auth::guard('walas')->id();
        Cache::forget('user-is-online-'.$userId);
        Auth::guard('walas')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Berhasil Logout');
    }
}
