<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Bimbingan_Belajar;
use App\Models\Bimbingan_Karir;
use App\Models\Bimbingan_Pribadi;
use App\Models\Bimbingan_Sosial;
use Illuminate\Http\Request;

class NoTokenApiController extends Controller
{
    //list
    public function bimbingan_pribadi($id)
    {
        $datas = Bimbingan_Pribadi::with('siswa', 'guru', 'walas', 'kelas')->where('siswa_id', $id)->where('status', 'Selesai')->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function bimbingan_belajar($id)
    {
        $datas = Bimbingan_Belajar::with('siswa', 'guru', 'walas', 'kelas')->where('siswa_id', $id)->where('status', 'Selesai')->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function bimbingan_sosial($id)
    {
        $datas = Bimbingan_Sosial::with('siswa', 'guru', 'walas', 'kelas')->where('siswa_id', $id)->where('status', 'Selesai')->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function bimbingan_karir($id)
    {
        $datas = Bimbingan_Karir::with('siswa', 'guru', 'walas', 'kelas')->where('siswa_id', $id)->where('status', 'Selesai')->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }




    // detail api
    public function detail_bimbingan_pribadi($id)
    {
        $datas = Bimbingan_Pribadi::with('siswa', 'guru', 'walas', 'kelas')->where('id', $id)->where('status', 'Selesai')->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function detail_bimbingan_belajar($id)
    {
        $datas = Bimbingan_Belajar::with('siswa', 'guru', 'walas', 'kelas')->where('id', $id)->where('status', 'Selesai')->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function detail_bimbingan_sosial($id)
    {
        $datas = Bimbingan_Sosial::with('siswa', 'guru', 'walas', 'kelas')->where('id', $id)->where('status', 'Selesai')->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function detail_bimbingan_karir($id)
    {
        $datas = Bimbingan_Karir::with('siswa', 'guru', 'walas', 'kelas')->where('id', $id)->where('status', 'Selesai')->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    

}
