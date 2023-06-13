<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;


use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Bimbingan_Pribadi;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Karir;
use App\Models\Bimbingan_Belajar;
use App\Models\Peta_Kerawanan;


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
            $pk = Peta_Kerawanan::with('siswa', 'kelas', 'walas', 'guru')->where('siswa_id', $user->id)->get();

            
            $bp = $bp->map(function ($item) {
                $item->siswa_id = $item->siswa->name;
                $item->kelas_id = $item->kelas->name;
                $item->walas_id = $item->walas->name;
                $item->guru_id = $item->guru->name;

                unset($item->siswa, $item->kelas, $item->walas, $item->guru);
                return $item;
            });            

            
            $bk = $bk->map(function ($item) {
                $item->siswa_id = $item->siswa->name;
                $item->kelas_id = $item->kelas->name;
                $item->walas_id = $item->walas->name;
                $item->guru_id = $item->guru->name;

                unset($item->siswa, $item->kelas, $item->walas, $item->guru);
                return $item;
            });            

            
            $bb = $bb->map(function ($item) {
                $item->siswa_id = $item->siswa->name;
                $item->kelas_id = $item->kelas->name;
                $item->walas_id = $item->walas->name;
                $item->guru_id = $item->guru->name;

                unset($item->siswa, $item->kelas, $item->walas, $item->guru);
                return $item;
            });            

            
            $bs = $bs->map(function ($item) {
                $item->siswa_id = $item->siswa->name;
                $item->kelas_id = $item->kelas->name;
                $item->walas_id = $item->walas->name;
                $item->guru_id = $item->guru->name;

                unset($item->siswa, $item->kelas, $item->walas, $item->guru);
                return $item;
            });            

            
            $pk = $pk->map(function ($item) {
                $item->siswa_id = $item->siswa->name;
                $item->kelas_id = $item->kelas->name;
                $item->walas_id = $item->walas->name;
                $item->guru_id = $item->guru->name;
                
                $item->sering_sakit = $item->sering_sakit ? 'iya' : 'tidak';
                $item->sering_izin = $item->sering_izin ? 'iya' : 'tidak';
                $item->sering_alpha = $item->sering_alpha ? 'iya' : 'tidak';
                $item->sering_terlambat = $item->sering_terlambat ? 'iya' : 'tidak';
                $item->bolos = $item->bolos ? 'iya' : 'tidak';
                $item->kelainan_jasmani = $item->kelainan_jasmani ? 'iya' : 'tidak';
                $item->minat_belajar_kurang = $item->minat_belajar_kurang ? 'iya' : 'tidak';
                $item->introvert = $item->introvert ? 'iya' : 'tidak';
                $item->tinggal_dengan_wali = $item->tinggal_dengan_wali ? 'iya' : 'tidak';
                $item->kemampuan_kurang = $item->kemampuan_kurang ? 'iya' : 'tidak';

                unset($item->siswa, $item->kelas, $item->walas, $item->guru);
                return $item;
            });            

            return response()->json([
                'data' => $user,
                'Bimbingan Pribadi' => $bp,
                'Bimbingan Karir' => $bk,
                'Bimbingan Belajar' => $bb,
                'Bimbingan Sosial' => $bs,
                'Peta Kerawanan' => $pk,
            ], 200);
        }

        // User is not authenticated
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
