<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Role;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Walas;
use App\Models\GuruKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Bimbingan_Karir;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Belajar;
use App\Models\Bimbingan_Pribadi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function home_admin()
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

        # Online User
        $users = User::whereNotNull('last_seen')->orderBy('last_seen','desc')->get();
        $siswas = Siswa::whereNotNull('last_seen')->orderBy('last_seen','desc')->get();
        $guru = Guru::whereNotNull('last_seen')->orderBy('last_seen','desc')->get();
        $walas = Walas::whereNotNull('last_seen')->orderBy('last_seen','desc')->get();
        $first_combined = $users->concat($siswas);
        $second_combined = $first_combined->concat($guru);
        $third_combined = $second_combined->concat($walas);

        return view('admin.home_admin', [
            "title" => "Dashboard",
            "siswa" => $totalsiswa,
            "guru" => $totalguru,
            "kelas" => $totalkelas,
            "walas" => $totalwalas,
            "online_user" => $third_combined,
        ]);
    }





    # Wali Kelas
    public function show_walas()
    {
        $datas = Walas::query()->paginate(5);
        return view('admin.walas.walas', [
            "datas" => $datas,
            "title" => "Wali Kelas"
        ]);
    }

    public function create_walas()
    {
        $datas = Kelas::all();
        return view('admin.walas.create_walas', [
            "title" => "Wali Kelas",
            "datas" => $datas
        ]);
    }
    public function store_walas(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nip' => 'required',
            'kelas_id' => 'required',
            'password' => 'required|min:8',
        ]);

        Walas::insert([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 4,
            'nip' => $request->nip,
            'kelas_id' => $request->kelas_id,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        session()->flash('message', 'Data Berhasil Diubah');

        return redirect()->route('show_walas')->with('message', 'Data Berhasil Ditambahkan');
    }
    public function edit_walas($id)
    {
        $data = Walas::query()->where('id', $id)->first();
        $kelas = Kelas::all();

        return view('admin.walas.edit_walas', [
            "data" => $data,
            "title" => "Wali Kelas",
            "kelas" => $kelas
        ]);
    }
    public function update_walas(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nip' => 'required',
            'kelas_id' => 'required',
            'password' => 'required|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'kelas_id' => $request->kelas_id,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
        ];

        Walas::where('id', $id)->update($data);

        session()->flash('message', 'Data Berhasil Diubah');

        return redirect()->route('show_walas');
    }
    public function destroy_walas($id)
    {
        Walas::find($id)->delete();
        session()->flash('message', 'Data Berhasil Dihapus');

        return redirect()->route('show_walas');
    }






    # Guru BK
    public function show_guru_bk()
    {
        $datas = Guru::query()->paginate(5);
        return view('admin.guru.guru_bk', [
            "datas" => $datas,
            "title" => "Guru BK"
        ]);
    }
    public function create_guru_bk()
    {
        $datax = Kelas::where('name', 'LIKE', '%X%')->where('name', 'NOT LIKE', '%XI%')->where('name', 'NOT LIKE', '%XII%')->get();
        $dataxi = Kelas::where('name', 'LIKE', '%XI%')->where('name', 'NOT LIKE', '%XII%')->get();
        $dataxii = Kelas::where('name', 'LIKE', '%XII%')->get();
        return view('admin.guru.create_guru_bk', [
            "title" => "Guru BK",
            "kelas_sepuluh" => $datax,
            "kelas_sebelas" => $dataxi,
            "kelas_duabelas" => $dataxii,
        ]);
    }
    public function store_guru_bk(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nip' => 'required',
            'password' => 'required|min:8',
            'foto' => 'required',
            'no_telp' => 'required',
            'motto' => 'required',
        ]);

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $fotoName = $foto->getClientOriginalName();
            $foto->move('foto_gurubk/', $fotoName);
        } else {
            $fotoName = NULL;
        }

        Guru::insert([
            'foto' => $fotoName,
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'motto' => $request->motto,
            'email' => $request->email,
            'role_id' => 3,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $guru = Guru::where('name', $request->name)->first();
        $guru_id = $guru->id;

        # Kelas Sepuluh
        if($request->kelas_sepuluh){
            $data = $request->kelas_sepuluh;
            foreach($data as $val){
                GuruKelas::insert([
                    'guru_id' => $guru_id,
                    'kelas_id' => $val,
                ]);
            }
        }

        # Kelas Sebelas
        if($request->kelas_sebelas){
            $data = $request->kelas_sebelas;
            foreach($data as $val){
                GuruKelas::insert([
                    'guru_id' => $guru_id,
                    'kelas_id' => $val,
                ]);
            }
        }
        
        # Kelas Dua Belas
        if($request->kelas_duabelas){
            $data = $request->kelas_duabelas;
            foreach($data as $val){
                GuruKelas::insert([
                    'guru_id' => $guru_id,
                    'kelas_id' => $val,
                ]);
            }
        }



        return redirect()->route('show_guru_bk')->with('message', 'Data Berhasil Ditambahkan');
    }
    public function edit_guru_bk($id)
    {
        $data = Guru::query()->where('id', $id)->first();
        return view('admin.guru.edit_guru_bk', [
            "data" => $data,
            "title" => "Guru BK"
        ]);
    }
    public function update_guru_bk(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nip' => 'required',
            'password' => 'required|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
        ];

        Guru::where('id', $id)->update($data);

        return redirect()->route('show_guru_bk')->with('message', 'Data Berhasil Diperbarui');
    }
    public function destroy_guru_bk($id)
    {
        Guru::find($id)->delete();
        session()->flash('message', 'Data Berhasil Dihapus');

        return redirect()->route('show_guru_bk')->with('message', 'Data Berhasil Dihapus');
    }

    # siswa
    public function show_siswa(Request $request, $id)
    {
        $datas = Siswa::with('kelas')->where('kelas_id', $id)->get();

        return view('admin.siswa.siswa', [
            "datas" => $datas,
            "title" => "Kelas",
            "id" => $id
        ]);
    }
    public function create_siswa(Request $request, $id)
    {
        $datas = Kelas::query()->get();
        $kelas = Kelas::where('id', $id)->get();
        return view('admin.siswa.create_siswa', [
            "datas" => $datas,
            "title" => "Kelas",
            "id" => $id,
            "kelas" => $kelas,
        ]);
    }
    public function store_siswa(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'password' => 'required|min:8',
        ]);

        Siswa::insert([
            'name' => $request->name,
            'email' => $request->email,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas_id,
            'role_id' => 2,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('show_siswa', $request->kelas_id);
    }
    public function edit_siswa($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $data = Siswa::query()->where('id', $id)->first();
        return view('admin.siswa.edit_siswa', [
            "kelas" => $kelas,
            "data" => $data,
            "title" => "Kelas"
        ]);
    }
    public function update_siswa(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'password' => 'required|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas_id,
            'password' => Hash::make($request->password),
        ];

        Siswa::where('id', $id)->update($data);

        return redirect()->route('show_siswa', $id);
    }
    public function destroy_siswa($id)
    {
        Siswa::where('id', $id)->delete();
        session()->flash('message', 'Data Berhasil Dihapus');

        return redirect()->route('show_kelas');
    }

    // kelas handler
    public function show_kelas()
    {
        $datas = Kelas::with(['guru','walas'])->paginate(4);
        return view('admin.kelas.kelas', [
            "title" => "Kelas",
            "datas" => $datas,
        ]);
    }
    public function create_kelas()
    {
        return view('admin.kelas.create_kelas', [
            "title" => "Kelas"
        ]);
    }
    public function store_kelas(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        Kelas::create([
            'name' => $request->name,
        ]);

        return redirect('admin/kelas');
    }
    public function update_kelas(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->name,
        ];

        Kelas::where('id', $id)->update($data);

        session()->flash('message', 'Data Berhasil Diubah');

        return redirect('admin/kelas');
    }
    public function edit_kelas($id)
    {
        $data = Kelas::query()->where('id', $id)->first();
        return view('admin.kelas.edit_kelas', [
            "data" => $data,
            "title" => "Wali Kelas"
        ]);
    }
    public function destroy_kelas($id)
    {
        Kelas::find($id)->delete();
        session()->flash('message', 'Data Berhasil Dihapus');

        return redirect()->route('show_kelas');
    }





    // arsip
    public function show_arsip()
    {
        $kelas = Kelas::paginate(9);
        return view('admin.archive.arsip',[
            "title" => "Arsip",
            "datas" => $kelas
        ]);
    }
    public function kelas_arsip($id)
    {
        return view('admin.archive.kelas_arsip',[
            "title" => "Arsip",
            "id" => $id,
        ]);
    }
    public function list_arsip_pribadi($id)
    {
        $datas = Bimbingan_Pribadi::where('kelas_id', $id)->where('status', 'Selesai')->get();
        return view('admin.archive.list_arsip_pribadi',[
            "title" => "Arsip",
            "id" => $id,
            "datas" => $datas,
        ]);
    }
    public function detail_arsip_pribadi($id, $kelas_id)
    {
        $data = Bimbingan_Pribadi::where('id', $id)->first();
        // dd($data);
        return view('admin.archive.detail_arsip_pribadi',[
            "title" => "Arsip",
            "id" => $id,
            "data" => $data,
            "kelas_id" => $kelas_id
        ]);
    }
    public function list_arsip_belajar($id)
    {
        $datas = Bimbingan_Belajar::where('kelas_id', $id)->get();
        return view('admin.archive.list_arsip_belajar',[
            "title" => "Arsip",
            "id" => $id,
            "datas" => $datas,
        ]);
    }
    public function detail_arsip_belajar($id, $kelas_id)
    {
        $data = Bimbingan_Belajar::where('id', $id)->first();
        // dd($data);
        return view('admin.archive.detail_arsip_belajar',[
            "title" => "Arsip",
            "id" => $id,
            "data" => $data,
            "kelas_id" => $kelas_id
        ]);
    }
    public function list_arsip_sosial($id)
    {
        $datas = Bimbingan_Sosial::where('kelas_id', $id)->get();
        return view('admin.archive.list_arsip_sosial',[
            "title" => "Arsip",
            "id" => $id,
            "datas" => $datas,
        ]);
    }
    public function detail_arsip_sosial($id, $kelas_id)
    {
        $data = Bimbingan_Sosial::where('id', $id)->first();
        $diajukan = Siswa::where('id', $data->diajukan)->get();

        // dd($data);
        return view('admin.archive.detail_arsip_sosial',[
            "title" => "Arsip",
            "id" => $id,
            "data" => $data,
            "kelas_id" => $kelas_id,
            "diajukan" => $diajukan[0]
        ]);
    }
    public function list_arsip_karir($id)
    {
        $datas = Bimbingan_Karir::where('kelas_id', $id)->get();
        return view('admin.archive.list_arsip_karir',[
            "title" => "Arsip",
            "id" => $id,
            "datas" => $datas,
        ]);
    }
    public function detail_arsip_karir($id, $kelas_id)
    {
        $data = Bimbingan_Karir::where('id', $id)->first();
        // dd($data);
        return view('admin.archive.detail_arsip_karir',[
            "title" => "Arsip",
            "id" => $id,
            "data" => $data,
            "kelas_id" => $kelas_id
        ]);
    }






    #profile
    public function show_profile_admin()
    {
    
        return view('admin.profile.profile',[
            "title" => "Profile"
        ]);
    }
}
