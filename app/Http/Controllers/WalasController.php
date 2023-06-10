<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Walas;
use App\Exports\PetaExport;
use Illuminate\Http\Request;
use App\Models\Peta_Kerawanan;
use App\Models\Bimbingan_Karir;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Belajar;
use App\Models\Bimbingan_Pribadi;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


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
        $user = Auth::guard('walas')->user();
        $datas = Bimbingan_Belajar::where('walas_id', $user->id)->paginate(5);  
        $kelas = Kelas::where('id',$user->kelas_id)->get();
        
        return view('walas.walas_list_bimbingan_pribadi', [
            "title" => "Pribadi",
            'datas' => $datas,
            'kelas' => $kelas[0]->name
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
        $user = Auth::guard('walas')->user();
        $datas = Bimbingan_Belajar::where('walas_id', $user->id)->paginate(5);  
        $kelas = Kelas::where('id',$user->kelas_id)->get();
        
        return view('walas.walas_list_bimbingan_belajar', [
            "title" => "Belajar",
            'datas' => $datas,
            'kelas' => $kelas[0]->name,
            
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
        $user = Auth::guard('walas')->user();
        $datas = Bimbingan_Belajar::where('walas_id', $user->id)->paginate(5);  
        $kelas = Kelas::where('id',$user->kelas_id)->get();

        return view('walas.walas_list_bimbingan_sosial', [
            "title" => "Sosial",
            'datas' => $datas,
            'kelas' => $kelas[0]->name
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
        $user = Auth::guard('walas')->user();
        $datas = Bimbingan_Belajar::where('walas_id', $user->id)->paginate(5);  
        $kelas = Kelas::where('id',$user->kelas_id)->get();
        
        return view('walas.walas_list_bimbingan_karir', [
            "title" => "Karir",
            'datas' => $datas,
            'kelas' => $kelas[0]->name
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
        $walas = Walas::where('id', Auth::guard('walas')->user()->id)->get();
        $datas = Siswa::where('kelas_id', $walas[0]->kelas_id)->get();
        
        return view('walas.walas_peta_kerawanan', [
            "title" => "Peta",
            "datas" => $datas,
            "kelas" => $datas[0]->kelas->name,
        ]);
    }
    public function walas_detail_peta_kerawanan($id)
    {
        $data = Peta_Kerawanan::with('kelas', 'siswa', 'walas', 'guru')->where('id', $id)->first();  
        
        return view('walas.walas_detail_peta_kerawanan', [
            "title" => "Peta",
            "data" => $data
        ]);
    }

    function export_peta_kerawanan($id)
    {
        
        return Excel::download(new PetaExport($id), 'peta Kerawanan.xlsx');
    }

    public function walas_update_peta_kerawanan(Request $request, $id)
    {
        $data = [
            'sering_sakit' => $request->sering_sakit,
            'sering_izin' => $request->sering_izin,
            'sering_alpha' => $request->sering_alpha,
            'sering_terlambat' => $request->sering_terlambat,
            'bolos' => $request->bolos,
            'kelainan_jasmani' => $request->kelainan_jasmani,
            'minat_belajar_kurang' => $request->minat_belajar_kurang,
            'introvert' => $request->introvert,
            'tinggal_dengan_wali' => $request->tinggal_dengan_wali,
            'kemampuan_kurang' => $request->kemampuan_kurang,
        ];

        Peta_Kerawanan::where('id', $id)->update($data);

        return redirect()->route('walas_peta_kerawanan', $id);
    }
}


