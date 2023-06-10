<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimbingan_Pribadi;
use App\Models\Bimbingan_Belajar;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Karir;


class WalasController extends Controller
{
    public function home_walas()
    {
        return view('walas.walas', [
            "title" => "Dashboard"
        ]);
    }

    // bimbingan pribadi
    public function walas_list_bimbingan_pribadi()
    {
        $id = Auth::guard('walas')->user()->id;
        $datas = Bimbingan_Pribadi::where('walas_id', $id)->paginate(5);
        $kelas = $datas[0]->kelas->name;
        return view('walas.walas_list_bimbingan_pribadi', [
            "title" => "Pribadi",
            'datas' => $datas,
            'kelas' => $kelas
        ]);
    }
    public function walas_detail_bimbingan_pribadi($id)
    {
        $data = Bimbingan_Pribadi::with('siswa','kelas','walas','guru' )->where('id', $id)->first();
        // dd($data);
        return view('walas.walas_detail_bimbingan_pribadi', [
            'title' => 'Pribadi',
            'data' => $data,
        ]);
    }





    // bimbingan belajar
    public function walas_list_bimbingan_belajar()
    {
        $id = Auth::guard('walas')->user()->id;
        $datas = Bimbingan_Belajar::where('walas_id', $id)->paginate(5);
        $kelas = $datas[0]->kelas->name;
        return view('walas.walas_list_bimbingan_belajar', [
            "title" => "Belajar",
            'datas' => $datas,
            'kelas' => $kelas
        ]);
    }
    public function walas_detail_bimbingan_belajar($id)
    {
        $data = Bimbingan_Belajar::with('siswa','kelas','walas','guru' )->where('id', $id)->first();
        // dd($data);
        return view('walas.walas_detail_bimbingan_belajar', [
            'title' => 'Belajar',
            'data' => $data,
        ]);
    }





    // bimbingan sosial
    public function walas_list_bimbingan_sosial()
    {
        $id = Auth::guard('walas')->user()->id;
        $datas = Bimbingan_Sosial::where('walas_id', $id)->paginate(5);
        $kelas = $datas[0]->kelas->name;
        return view('walas.walas_list_bimbingan_sosial', [
            "title" => "Sosial",
            'datas' => $datas,
            'kelas' => $kelas
        ]);
    }
    public function walas_detail_bimbingan_sosial($id)
    {
        $data = Bimbingan_Sosial::with('siswa','kelas','walas','guru','diajukan' )->where('id', $id)->first();
        // dd($data);
        return view('walas.walas_detail_bimbingan_sosial', [
            'title' => 'Sosial',
            'data' => $data,
        ]);
    }






    // bimbingan karir
    public function walas_list_bimbingan_Karir()
    {
        $id = Auth::guard('walas')->user()->id;
        $datas = Bimbingan_Karir::where('walas_id', $id)->paginate(5);
        $kelas = $datas[0]->kelas->name;
        return view('walas.walas_list_bimbingan_karir', [
            "title" => "Karir",
            'datas' => $datas,
            'kelas' => $kelas
        ]);
    }
    public function walas_detail_bimbingan_karir($id)
    {
        $data = Bimbingan_Karir::with('siswa','kelas','walas','guru' )->where('id', $id)->first();
        // dd($data);
        return view('walas.walas_detail_bimbingan_karir', [
            'title' => 'Karir',
            'data' => $data,
        ]);
    }
    




    // peta kerawanan
    public function walas_peta_kerawanan()
    {
        return view('walas.walas_peta_kerawanan', [
            "title" => "Peta"
        ]);
    }
}
