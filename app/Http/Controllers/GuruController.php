<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Belajar;
use App\Models\Bimbingan_Karir;
use App\Models\Bimbingan_Pribadi;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function home_guru()
    {
        return view('guru.guru', [
            "title" => "Dashboard",
        ]);
    }

    // bimbingan pribadi
    public function guru_bimbingan_pribadi()
    {
        $user = Auth::guard('guru')->user();
        $walas = Walas::where('kelas_id', $user->id)->first();
        
        $datas = Bimbingan_Pribadi::where('guru_id', $user->id)->paginate(5);
        return view('guru.guru_bimbingan_pribadi',[
            'title' => 'Pribadi',
            'user' => $user,
            'datas' => $datas,
            'walas' => $walas,
        ]);   
    }
    public function guru_detail_bimbingan_pribadi($id)
    {
        $data = Bimbingan_Pribadi::with('siswa', 'kelas', 'walas', 'guru')->where('id', $id)->first();
        return view('guru.guru_detail_bimbingan_pribadi', [
            'title' => 'Pribadi',
            'data' => $data,
        ]);
    }
    public function guru_update_bimbingan_pribadi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
            
        ]);

        $data = [
            'status' => $request->status,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'alasan_guru' => $request->alasan_guru,
            'solusi_guru' => $request->solusi_guru,
        ];

        Bimbingan_Pribadi::where('id', $id)->update($data);

        return redirect()->route('guru_bimbingan_pribadi');
    }





    // bimbingan belajar
    public function guru_bimbingan_belajar()
    {
        $user = Auth::guard('guru')->user();
        $walas = Walas::where('kelas_id', $user->id)->first();
        
        $datas = Bimbingan_Belajar::where('guru_id', $user->id)->paginate(5);
        return view('guru.guru_bimbingan_belajar',[
            'title' => 'Belajar',
            'user' => $user,
            'datas' => $datas,
            'walas' => $walas,
        ]);   
    }
    public function guru_detail_bimbingan_belajar($id)
    {
        $data = Bimbingan_Belajar::with('siswa', 'kelas', 'walas', 'guru')->where('id', $id)->first();
        return view('guru.guru_detail_bimbingan_belajar', [
            'title' => 'Belajar',
            'data' => $data,
        ]);
    }
    public function guru_update_bimbingan_belajar(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
            
        ]);

        $data = [
            'status' => $request->status,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'alasan_guru' => $request->alasan_guru,
            'solusi_guru' => $request->solusi_guru,
        ];

        Bimbingan_Belajar::where('id', $id)->update($data);

        return redirect()->route('guru_bimbingan_belajar');
    }





    // bimbingan sosial
    public function guru_bimbingan_sosial()
    {
        $user = Auth::guard('guru')->user();
        $walas = Walas::where('kelas_id', $user->id)->first();
        
        $datas = Bimbingan_Sosial::where('guru_id', $user->id)->paginate(5);
        return view('guru.guru_bimbingan_sosial',[
            'title' => 'Sosial',
            'user' => $user,
            'datas' => $datas,
            'walas' => $walas,
        ]);   
    }
    public function guru_detail_bimbingan_sosial($id)
    {
        $data = Bimbingan_Sosial::with('siswa', 'kelas', 'walas', 'guru')->where('id', $id)->first();
        $diajukan = Siswa::where('id', $data->diajukan)->first();
        return view('guru.guru_detail_bimbingan_sosial', [
            'title' => 'Sosial',
            'data' => $data,
            'diajukan' => $diajukan
        ]);
    }
    public function guru_update_bimbingan_sosial(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
            
        ]);

        $data = [
            'status' => $request->status,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'alasan_guru' => $request->alasan_guru,
            'solusi_guru' => $request->solusi_guru,
        ];

        Bimbingan_Sosial::where('id', $id)->update($data);

        return redirect()->route('guru_bimbingan_sosial');
    }





    // bimbingan karir
    public function guru_bimbingan_karir()
    {
        $user = Auth::guard('guru')->user();
        $walas = Walas::where('kelas_id', $user->id)->first();
        
        $datas = Bimbingan_Karir::where('guru_id', $user->id)->paginate(5);
        return view('guru.guru_bimbingan_karir',[
            'title' => 'Karir',
            'user' => $user,
            'datas' => $datas,
            'walas' => $walas,
        ]);   
    }
    public function guru_detail_bimbingan_karir($id)
    {
        $data = Bimbingan_Karir::with('siswa', 'kelas', 'walas', 'guru')->where('id', $id)->first();
        return view('guru.guru_detail_bimbingan_karir', [
            'title' => 'Karir',
            'data' => $data,
        ]);
    }
    public function guru_update_bimbingan_karir(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
            
        ]);

        $data = [
            'status' => $request->status,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'alasan_guru' => $request->alasan_guru,
            'solusi_guru' => $request->solusi_guru,
        ];

        Bimbingan_Karir::where('id', $id)->update($data);

        return redirect()->route('guru_bimbingan_karir');
    }
}



// jangan dihapus
// $data = Guru::find(Auth::guard('guru')->user()->id);
//         $kelasInfo = $data->kelas->map(function ($kelas) {
//             return [
//                 'id' => $kelas->id,
//                 'name' => $kelas->name,
//             ];
//         });
// @foreach ($kelasInfo as $kelas)
//     {{ $kelas['id'] }} - {{ $kelas['name'] }}
// @endforeach
