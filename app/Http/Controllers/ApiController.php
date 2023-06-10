<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::guard('siswa')->attempt($credentials)) {
            $user = Auth::guard('siswa')->user();
            $token = $user->createToken('SiswaToken')->plainTextToken;

            return response()->json(['token' => $token, 'user' => $user], 200);
        }

        throw ValidationException::withMessages([
            'email' => 'Invalid credentials',
        ]);
    }
}
