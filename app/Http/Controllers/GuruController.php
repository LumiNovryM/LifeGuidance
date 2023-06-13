<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Walas;
use App\Exports\PetaExport;
use Illuminate\Http\Request;
use App\Models\Peta_Kerawanan;
use App\Models\Bimbingan_Karir;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Belajar;
use App\Models\Bimbingan_Pribadi;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
        $name = Siswa::all();
        $datas = Bimbingan_Pribadi::where('guru_id', $user->id)->paginate(5);
        return view('guru.guru_bimbingan_pribadi', [
            'title' => 'Pribadi',
            'user' => $user,
            'datas' => $datas,
            'walas' => $walas,
            'names' => $name, 
        ]);
    }
    public function guru_store_bimbingan_pribadi(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        $siswa = Siswa::find($request->siswa_id);
        $kelas = Kelas::where("id", $siswa->kelas_id)->first();
        $walas = Walas::where("kelas_id", $siswa->kelas_id)->first();
      

        Bimbingan_Pribadi::insert([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $kelas->id,
            'walas_id' => $walas->id,
            'guru_id' => Auth::guard("guru")->user()->id,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'status' => 'Panggilan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        session()->flash('message', 'Pertemuan Berhasil Ditambahkan');

        return redirect()->route('guru_bimbingan_pribadi');
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
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',

        ]);

        $status = "";

        
        if($request->status == "Ditunda" || $request->status == "Panggilan")
        {
            $status = "Selesai";
        }else if($request->status != "Ditunda"){
            $status = "Ditunda";
        }
        
        $data = [
            'status' => $status,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'alasan_guru' => $request->alasan_guru,
            'solusi_guru' => $request->solusi_guru,
        ];

        Bimbingan_Pribadi::where('id', $id)->update($data);

        session()->flash('message', 'Pertemuan Berhasil Diubah');

        return redirect()->route('guru_bimbingan_pribadi');
    }
    public function guru_accept_bimbingan_pribadi($id)
    {
        $data = [
            'status' => "Diterima",
        ];

        Bimbingan_Pribadi::where('id', $id)->update($data);

        session()->flash('message', 'Pertemuan Berhasil Diterima');

        return redirect()->route('guru_bimbingan_pribadi');
    }





    // bimbingan belajar
    public function guru_bimbingan_belajar()
    {
        $user = Auth::guard('guru')->user();
        $walas = Walas::where('kelas_id', $user->id)->first();
        $name = Siswa::all();
        $datas = Bimbingan_Belajar::where('guru_id', $user->id)->paginate(5);
        return view('guru.guru_bimbingan_belajar', [
            'title' => 'Belajar',
            'user' => $user,
            'datas' => $datas,
            'walas' => $walas,
            'names' => $name,
        ]);
    }
    public function guru_store_bimbingan_belajar(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        $siswa = Siswa::find($request->siswa_id);
        $kelas = Kelas::where("id", $siswa->kelas_id)->first();
        $walas = Walas::where("kelas_id", $siswa->kelas_id)->first();
      

        Bimbingan_Belajar::insert([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $kelas->id,
            'walas_id' => $walas->id,
            'guru_id' => Auth::guard("guru")->user()->id,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'status' => 'Panggilan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        session()->flash('message', 'Pertemuan Berhasil Ditambahkan');

        return redirect()->route('guru_bimbingan_belajar');
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
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',

        ]);

        $status = "";

        // dd($request->status);
        if($request->status == "Ditunda" || $request->status == "Panggilan")
        {
            $status = "Selesai";
        }else if($request->status != "Ditunda"){
            $status = "Ditunda";
        }

        $data = [
            'status' => $status,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'alasan_guru' => $request->alasan_guru,
            'solusi_guru' => $request->solusi_guru,
        ];

        Bimbingan_Belajar::where('id', $id)->update($data);

        session()->flash('message', 'Pertemuan Berhasil Diubah');

        return redirect()->route('guru_bimbingan_belajar');
    }
    public function guru_accept_bimbingan_belajar($id)
    {
        $data = [
            'status' => "Diterima",
        ];

        Bimbingan_Belajar::where('id', $id)->update($data);

        session()->flash('message', 'Pertemuan Berhasil Diterima');

        return redirect()->route('guru_bimbingan_belajar');
    }





    // bimbingan sosial
    public function guru_bimbingan_sosial()
    {
        $user = Auth::guard('guru')->user();
        $walas = Walas::where('kelas_id', $user->id)->first();
        $name = Siswa::all();
        $datas = Bimbingan_Sosial::where('guru_id', $user->id)->paginate(5);
        return view('guru.guru_bimbingan_sosial', [
            'title' => 'Sosial',
            'user' => $user,
            'datas' => $datas,
            'walas' => $walas,
            'names' => $name
        ]);
    }
    public function guru_store_bimbingan_sosial(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
            'diajukan' => 'required',
        ]);

        $siswa = Siswa::find($request->siswa_id);
        $kelas = Kelas::where("id", $siswa->kelas_id)->first();
        $walas = Walas::where("kelas_id", $siswa->kelas_id)->first();
      

        Bimbingan_Sosial::insert([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $kelas->id,
            'walas_id' => $walas->id,
            'guru_id' => Auth::guard("guru")->user()->id,
            'diajukan' => $request->diajukan,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'status' => 'Panggilan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        session()->flash('message', 'Pertemuan Berhasil Ditambahkan');

        return redirect()->route('guru_bimbingan_sosial');
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
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',

        ]);

        $status = "";

        // dd($request->status);
        if($request->status == "Ditunda" || $request->status == "Panggilan")
        {
            $status = "Selesai";
        }else if($request->status != "Ditunda"){
            $status = "Ditunda";
        }

        $data = [
            'status' => $status,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'alasan_guru' => $request->alasan_guru,
            'solusi_guru' => $request->solusi_guru,
        ];

        Bimbingan_Sosial::where('id', $id)->update($data);

        session()->flash('message', 'Pertemuan Berhasil Diubah');

        return redirect()->route('guru_bimbingan_sosial');
    }
    public function guru_accept_bimbingan_sosial($id)
    {
        $data = [
            'status' => "Diterima",
        ];

        Bimbingan_Sosial::where('id', $id)->update($data);

        session()->flash('message', 'Pertemuan Berhasil Diterima');

        return redirect()->route('guru_bimbingan_sosial');
    }





    // bimbingan karir
    public function guru_bimbingan_karir()
    {
        $user = Auth::guard('guru')->user();
        $walas = Walas::where('kelas_id', $user->id)->first();
        $name = Siswa::all();
        $datas = Bimbingan_Karir::where('guru_id', $user->id)->paginate(5);
        return view('guru.guru_bimbingan_karir', [
            'title' => 'Karir',
            'user' => $user,
            'datas' => $datas,
            'walas' => $walas,
            'names' => $name
        ]);
    }
    public function guru_store_bimbingan_karir(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
            'tipe_bimbingan' => 'required',
        ]);

        $siswa = Siswa::find($request->siswa_id);
        $kelas = Kelas::where("id", $siswa->kelas_id)->first();
        $walas = Walas::where("kelas_id", $siswa->kelas_id)->first();
      

        Bimbingan_Karir::insert([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $kelas->id,
            'walas_id' => $walas->id,
            'guru_id' => Auth::guard("guru")->user()->id,
            'tipe_bimbingan' => $request->tipe_bimbingan,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'status' => 'Panggilan',
            'tipe_request' => 'Sosialisasi',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        session()->flash('message', 'Pertemuan Berhasil Ditambahkan');

        return redirect()->route('guru_bimbingan_karir');
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
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',

        ]);

        $status = "";

        // dd($request->status);
        if($request->status == "Ditunda" || $request->status == "Panggilan")
        {
            $status = "Selesai";
        }else if($request->status != "Ditunda"){
            $status = "Ditunda";
        }

        $data = [
            'status' => $status,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'alasan_guru' => $request->alasan_guru,
            'solusi_guru' => $request->solusi_guru,
        ];

        Bimbingan_Karir::where('id', $id)->update($data);

        session()->flash('message', 'Pertemuan Berhasil Diubah');

        return redirect()->route('guru_bimbingan_karir');
    }
    public function guru_accept_bimbingan_karir($id)
    {
        $data = [
            'status' => "Diterima",
        ];

        Bimbingan_Karir::where('id', $id)->update($data);

        session()->flash('message', 'Pertemuan Berhasil Diterima');

        return redirect()->route('guru_bimbingan_karir');
    }
    public function guru_finish_bimbingan_karir($id)
    {
        $data = [
            'status' => "Selesai",
        ];

        Bimbingan_Karir::where('id', $id)->update($data);

        session()->flash('message', 'Pertemuan Berhasil Diubah');

        return redirect()->route('guru_bimbingan_karir');
    }





    // peta kerawanan
    public function guru_peta_kerawanan()
    {
        $data = Guru::find(Auth::guard('guru')->user()->id);
        $datas = $data->kelas->map(function ($kelas) {
            return [
                'id' => $kelas->id,
                'name' => $kelas->name,
            ];
        });
        return view("guru.guru_peta_kerawanan", [
            "title" => "Peta",
            "datas" => $datas
        ]);
    }
    function export_excel($id)
    {
        $data = Peta_Kerawanan::with('kelas', 'siswa', 'walas', 'guru')->where('kelas_id', $id)->get();
        // dd($data);
        return Excel::download(new PetaExport($id), 'peta Kerawanan.xlsx');
    }

    public function export_pdf($id)
    {
        $data = Peta_Kerawanan::with('siswa', 'kelas', 'walas', 'guru')->where('id', $id)->first();

        // dd($data);
    
        $pdf = Pdf::loadView('pdf.peta_kerawanan', ['data' => $data]);
    
        return $pdf->stream('peta_kerawanan.pdf');
    }
    
    public function guru_list_peta_kerawanan($id)
    {
        $datas = Siswa::where('kelas_id', $id)->paginate(10);
        return view('guru.guru_list_peta_kerawanan', [
            "title" => "Peta",
            "datas" => $datas,
            "kelas" => $datas[0]->kelas->name,
        ]);
    }
    public function guru_edit_peta_kerawanan($id)
    {
        $data = Peta_Kerawanan::with('kelas', 'siswa', 'walas', 'guru')->where('siswa_id', $id)->first();  
        return view("guru.guru_edit_peta_kerawanan", [
            "title" => "Peta",
            "data" => $data,
            "ids" => $id
        ]);   
    }
    public function guru_update_peta_kerawanan(Request $request, $id)
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
            'kesimpulan' => $request->kesimpulan
        ];

        Peta_Kerawanan::where('id', $id)->update($data);
        session()->flash('message', 'Peta Kerawanan Berhasil Ubah');

        return redirect()->route('guru_peta_kerawanan');
    }
    public function guru_create_peta_kerawanan($id)
    {
        $siswa = Siswa::find($id);
        $guru = Guru::whereHas('kelas', function ($query) use ($siswa) {
            $query->where('kelas_id', $siswa->kelas->id);
        })->get();
        $walas = Walas::where('kelas_id', $siswa->kelas->id)->first();
        return view("guru.guru_create_peta_kerawanan", [
            "title" => "Peta",
            "siswa" => $siswa,
            "guru" => $guru[0],
            "walas" => $walas
        ]);   
    }
    public function guru_store_peta_kerawanan(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'guru_id' => 'required',
            'walas_id' => 'required',
            'kelas_id' => 'required',
            'sering_sakit' => 'required',
            'sering_izin' => 'required',
            'sering_alpha' => 'required',
            'sering_terlambat' => 'required',
            'bolos' => 'required',
            'kelainan_jasmani' => 'required',
            'minat_belajar_kurang' => 'required',
            'introvert' => 'required',
            'tinggal_dengan_wali' => 'required',
            'kemampuan_kurang' => 'required',
        ]);

        Peta_Kerawanan::insert([
            'siswa_id' => $request->siswa_id,
            'guru_id' => $request->guru_id,
            'walas_id' => $request->walas_id,
            'kelas_id' => $request->kelas_id,
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
        ]);

        return redirect()->route('guru_peta_kerawanan', $request->kelas_id);
    }

    # Profile
    public function show_profile_guru()
    {
        return view('guru.profile.profile',[
            "title" => "Profile",
        ]);
    }
}
