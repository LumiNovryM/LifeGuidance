<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;


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
    
        // Invalid credentials
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
    
}
