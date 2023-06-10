<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Walas;
use App\Models\Bimbingan_Pribadi;
use Illuminate\Http\Request;
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
}




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
