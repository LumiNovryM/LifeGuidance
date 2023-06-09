<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Bimbingan_Karir;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Belajar;
use App\Models\Bimbingan_Pribadi;
use App\Notifications\Bimbingan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function home_siswa()
    {
        # Siswa
        $siswa = Siswa::all();
        $totalsiswa = $siswa->count();
        # Guru
        $guru = Guru::all();
        $totalguru = $guru->count();
        # Kelas
        $kelas = Kelas::all();
        $totalkelas = $kelas->count();
        # Wali Kelas
        $walas = Walas::all();
        $totalwalas = $walas->count();

       return view('siswa.siswa', [
           'title' => 'Dashboard',
           "siswa" => $totalsiswa,
           "guru" => $totalguru,
           "kelas" => $totalkelas,
           "walas" => $totalwalas,
       ]);
    }


    #bimbingan_pribadi
    public function show_bimbingan_pribadi()
    {
        $user = Auth::guard('siswa')->user();
        $walas = Walas::where('kelas_id', $user->kelas->id)->first();
        $kelasName = $user->kelas->name;
        $guru = Guru::whereHas('kelas', function ($query) use ($kelasName) {
            $query->where('name', $kelasName);
        })->get();

        $datas = Bimbingan_Pribadi::where('siswa_id', $user->id)->paginate(5);
        // dd($guru);
        return view('siswa.bimbingan_pribadi', [
            'title' => 'Bimbingan Pribadi',
            'user' => $user,
            'datas' => $datas,
            'walas' => $walas,
            'guru' => $guru[0]
        ]);
    }

    public function store_bimbingan_pribadi(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'walas_id' => 'required',
            'guru_id' => 'required',
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        Bimbingan_Pribadi::insert([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'walas_id' => $request->walas_id,
            'guru_id' => $request->guru_id,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'status' => 'Menunggu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $guru = Guru::find($request->guru_id);
        $siswa = Siswa::find($request->siswa_id);
        
        $message['pengirim'] = "Request Bimbingan Pribadi : {$siswa->name}";
        $message['alasan'] = "Request Bimbingan Pribadi : {$request->alasan_pertemuan}";
        $message['tanggal'] = "Tanggal Pertemuan Pribadi : {$request->tanggal_pertemuan}";
        $message['tempat'] = "Tempat Pertemuan Pribadi : {$request->lokasi_pertemuan}";

        $guru->notify(new Bimbingan($message));

        session()->flash('message', 'Pertemuan Berhasil Ditambahkan');

        return redirect()->route('show_bimbingan_pribadi');
    }
    public function detail_bimbingan_pribadi($id)
    {
        $data = Bimbingan_Pribadi::with('siswa', 'kelas', 'walas', 'guru')->where('id', $id)->first();
        // dd($data);
        return view('siswa.detail_bimbingan_pribadi', [
            'title' => 'Bimbingan Pribadi',
            'data' => $data,
        ]);
    }




    //bimbingan belajar
    public function bimbingan_belajar()
    {
        $user = Auth::guard('siswa')->user();
        $walas = Walas::where('kelas_id', $user->kelas->id)->first();
        $datas = Bimbingan_Belajar::where('siswa_id', $user->id)->paginate(5);
        $kelasName = $user->kelas->name;

        $guru = Guru::whereHas('kelas', function ($query) use ($kelasName) {
            $query->where('name', $kelasName);
        })->get();

        return view('siswa.bimbingan_belajar', [
            'title' => 'Belajar',
            'user' => $user,
            'walas' => $walas,
            'datas' => $datas,
            'guru' => $guru[0],
        ]);
    }

    public function store_bimbingan_belajar(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'walas_id' => 'required',
            'guru_id' => 'required',
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        Bimbingan_Belajar::insert([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'walas_id' => $request->walas_id,
            'guru_id' => $request->guru_id,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'status' => 'Menunggu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $guru = Guru::find($request->guru_id);
        $siswa = Siswa::find($request->siswa_id);
        
        $message['pengirim'] = "Request Bimbingan Belajar : {$siswa->name}";
        $message['alasan'] = "Request Bimbingan Belajar : {$request->alasan_pertemuan}";
        $message['tanggal'] = "Tanggal Pertemuan Belajar : {$request->tanggal_pertemuan}";
        $message['tempat'] = "Tempat Pertemuan Belajar : {$request->lokasi_pertemuan}";

        $guru->notify(new Bimbingan($message));

        session()->flash('message', 'Pertemuan Berhasil Ditambahkan');

        return redirect()->route('bimbingan_belajar');
    }
    public function detail_bimbingan_belajar($id)
    {
        $data = Bimbingan_Belajar::with('siswa', 'kelas', 'walas', 'guru')->where('id', $id)->first();
        return view('siswa.detail_bimbingan_belajar', [
            'title' => 'Belajar',
            'data' => $data,
        ]);
    }





    // bimbingan sosial
    public function bimbingan_sosial()
    {
        $user = Auth::guard('siswa')->user();
        $walas = Walas::where('kelas_id', $user->kelas->id)->first();
        $datas = Bimbingan_Sosial::where('siswa_id', $user->id)->orWhere('diajukan', $user->id)->paginate(5);
        $kelasName = $user->kelas->name;
        $guru = Guru::whereHas('kelas', function ($query) use ($kelasName) {
            $query->where('name', $kelasName);
        })->get();
        $diajak = Siswa::all();


        return view('siswa.bimbingan_sosial', [
            'title' => 'Sosial',
            'user' => $user,
            'walas' => $walas,
            'datas' => $datas,
            'diajak' => $diajak,
            'guru' => $guru[0]
        ]);
    }

    public function store_bimbingan_sosial(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'walas_id' => 'required',
            'diajukan' => 'required',
            'guru_id' => 'required',
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        Bimbingan_Sosial::insert([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'walas_id' => $request->walas_id,
            'guru_id' => $request->guru_id,
            'diajukan' => $request->diajukan,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'status' => 'Menunggu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $guru = Guru::find($request->guru_id);
        $siswa = Siswa::find($request->siswa_id);
        
        $message['pengirim'] = "Request Bimbingan Sosial : {$siswa->name}";
        $message['alasan'] = "Request Bimbingan Sosial : {$request->alasan_pertemuan}";
        $message['tanggal'] = "Tanggal Pertemuan Sosial : {$request->tanggal_pertemuan}";
        $message['tempat'] = "Tempat Pertemuan Sosial : {$request->lokasi_pertemuan}";

        $guru->notify(new Bimbingan($message));

        session()->flash('message', 'Pertemuan Berhasil Ditambahkan');

        return redirect()->route('bimbingan_sosial');
    }
    public function detail_bimbingan_sosial($id)
    {
        $data = Bimbingan_Sosial::with('siswa', 'kelas', 'walas', 'guru',)->where('id', $id)->first();
        $diajukan = Siswa::where('id', $data->diajukan)->get();
        // dd($diajukan);
        return view('siswa.detail_bimbingan_sosial', [
            'title' => 'Sosial',
            'data' => $data,
            'diajukan' => $diajukan[0]
        ]);
    }





    // bimbingan karir
    public function bimbingan_karir()
    {
        $user = Auth::guard('siswa')->user();
        $datas = Bimbingan_Karir::where('siswa_id', $user->id)->paginate(5);
        $walas = Walas::where('kelas_id', $user->kelas->id)->first();
        $kelasName = $user->kelas->name;
        $guru = Guru::whereHas('kelas', function ($query) use ($kelasName) {
            $query->where('name', $kelasName);
        })->get();

        return view('siswa.bimbingan_karir', [
            'title' => 'Karir',
            'user' => $user,
            'walas' => $walas,
            'datas' => $datas,
            'guru' => $guru[0]
        ]);
    }
    public function store_bimbingan_karir(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'walas_id' => 'required',
            'tipe_bimbingan' => 'required',
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        Bimbingan_Karir::insert([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'walas_id' => $request->walas_id,
            'guru_id' => 1,
            'tipe_bimbingan' => $request->tipe_bimbingan,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'status' => 'Menunggu',
            'tipe_request' => 'Permintaan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $guru = Guru::find($request->guru_id);
        $siswa = Siswa::find($request->siswa_id);
        
        $message['pengirim'] = "Request Bimbingan Karir : {$siswa->name}";
        $message['alasan'] = "Request Bimbingan Karir : {$request->alasan_pertemuan}";
        $message['tanggal'] = "Tanggal Pertemuan Karir : {$request->tanggal_pertemuan}";
        $message['tempat'] = "Tempat Pertemuan Karir : {$request->lokasi_pertemuan}";

        $guru->notify(new Bimbingan($message));

        session()->flash('message', 'Pertemuan Berhasil Ditambahkan');

        return redirect()->route('bimbingan_karir');
    }
    public function detail_bimbingan_karir($id)
    {
        $data = Bimbingan_Karir::with('siswa', 'kelas', 'walas', 'guru')->where('id', $id)->first();
        return view('siswa.detail_bimbingan_karir', [
            'title' => 'Karir',
            'data' => $data,
        ]);
    }

    public function show_profile()
    {
        return view('siswa.profile.profile',[
            "title" => "Profile",
        ]);
    }

}
