<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;


use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Bimbingan_Pribadi;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Karir;
use App\Models\Bimbingan_Belajar;


class ApiController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
    
        if (Auth::guard('siswa')->attempt($credentials)) {
            $user = Auth::guard('siswa')->user();
            $token = $user->createToken('SiswaToken')->plainTextToken;
    
            return response()->json([
                'token' => $token,
                //  'user' => $user
                ], 200);
        }
    
        // Invalid credentials
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
    
    public function getData()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Access the authenticated user's data
            $user = Auth::user();

            // Retrieve data based on the authenticated user
            $bp = Bimbingan_Pribadi::with('siswa', 'kelas', 'walas', 'guru')->where('siswa_id', $user->id)->get();
            $bk = Bimbingan_Karir::with('siswa', 'kelas', 'walas', 'guru')->where('siswa_id', $user->id)->get();
            $bb = Bimbingan_Belajar::with('siswa', 'kelas', 'walas', 'guru')->where('siswa_id', $user->id)->get();
            $bs = Bimbingan_Sosial::with('siswa', 'kelas', 'walas', 'guru')->where('siswa_id', $user->id)->get();

            // Transform IDs to names in Bimbingan Pribadi
            $bp = $bp->map(function ($item) {
                $item->siswa_id = $item->siswa->name;
                $item->kelas_id = $item->kelas->name;
                $item->walas_id = $item->walas->name;
                $item->guru_id = $item->guru->name;

                unset($item->siswa, $item->kelas, $item->walas, $item->guru);
                return $item;
            });            

            // Transform IDs to names in Bimbingan Pribadi
            $bk = $bk->map(function ($item) {
                $item->siswa_id = $item->siswa->name;
                $item->kelas_id = $item->kelas->name;
                $item->walas_id = $item->walas->name;
                $item->guru_id = $item->guru->name;

                unset($item->siswa, $item->kelas, $item->walas, $item->guru);
                return $item;
            });            

            // Transform IDs to names in Bimbingan Pribadi
            $bb = $bb->map(function ($item) {
                $item->siswa_id = $item->siswa->name;
                $item->kelas_id = $item->kelas->name;
                $item->walas_id = $item->walas->name;
                $item->guru_id = $item->guru->name;

                unset($item->siswa, $item->kelas, $item->walas, $item->guru);
                return $item;
            });            

            // Transform IDs to names in Bimbingan Pribadi
            $bs = $bs->map(function ($item) {
                $item->siswa_id = $item->siswa->name;
                $item->kelas_id = $item->kelas->name;
                $item->walas_id = $item->walas->name;
                $item->guru_id = $item->guru->name;

                unset($item->siswa, $item->kelas, $item->walas, $item->guru);
                return $item;
            });            

            return response()->json([
                'data' => $user,
                'Bimbingan Pribadi' => $bp,
                'Bimbingan Karir' => $bk,
                'Bimbingan Belajar' => $bb,
                'Bimbingan Sosial' => $bs,
            ], 200);
        }

        // User is not authenticated
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
