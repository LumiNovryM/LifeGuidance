<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\GuruKelas;
use App\Models\Kelas;
use App\Models\Role;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home_admin()
    {
        return view('admin.home_admin', [
            "title" => "Dashboard"
        ]);
    }

    # Wali Kelas
    public function show_walas()
    {
        $datas = Walas::query()->paginate(2);
        return view('admin.walas.walas', [
            "datas" => $datas,
            "title" => "Wali Kelas"
        ]);
    }

    public function create_walas()
    {
        return view('admin.walas.create_walas', [
            "title" => "Wali Kelas"
        ]);
    }
    public function store_walas(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nip' => 'required',
            'password' => 'required|min:8',
        ]);

        Walas::insert([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 4,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('show_walas');
    }
    public function edit_walas($id)
    {
        $data = Walas::query()->where('id', $id)->first();
        return view('admin.walas.edit_walas', [
            "data" => $data,
            "title" => "Wali Kelas"
        ]);
    }
    public function update_walas(Request $request, $id)
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

        Walas::where('id', $id)->update($data);

        return redirect()->route('show_walas');
    }
    public function destroy_walas($id)
    {
        Walas::find($id)->delete();
        return redirect()->route('show_walas');
    }



    # Guru BK
    public function show_guru_bk()
    {
        $datas = Guru::query()->paginate(2);
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
        ]);

        Guru::insert([
            'name' => $request->name,
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

        return redirect()->route('show_guru_bk');
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

        return redirect()->route('show_guru_bk');
    }
    public function destroy_guru_bk($id)
    {
        Guru::find($id)->delete();
        return redirect()->route('show_guru_bk');
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
        return redirect()->route('show_kelas');
    }

    #profile
    public function show_profile(){
    
        return view('admin.profile.profile',[
            "title" => "Profile"
        ]);
    }
}
