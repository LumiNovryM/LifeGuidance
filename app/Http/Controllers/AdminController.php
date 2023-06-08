<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
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
        return view('admin.home_admin',[
            "title" => "Dashboard"
        ]);
    }

    # Wali Kelas
    public function show_walas()
    {
        $datas = Walas::query()->get();   
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
        $datas = Guru::query()->get();   
        return view('admin.guru.guru_bk', [
            "datas" => $datas,
            "title" => "Guru BK"
        ]);
    }
    public function create_guru_bk()
    {
        return view('admin.guru.create_guru_bk', [
            "title" => "Guru BK"
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
    public function show_siswa($id)
    {
        $datas = Siswa::with('kelas')->get();   
        // dd($datas[1]);
        return view('admin.siswa.siswa', [
            "datas" => $datas,
            "title" => "Kelas"
        ]);
    }
    public function create_siswa()
    {
        $datas = Kelas::query()->get();   
        return view('admin.siswa.create_siswa', [
            "datas" => $datas,
            "title" => "Kelas"
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
            'role_id'=> 2,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('show_siswa');
    }
    public function edit_siswa($id)
    {
        $datas = Kelas::query()->get();   
        $data = Siswa::query()->where('id', $id)->first();   
        return view('admin.siswa.edit_siswa', [
            "datas" => $datas,
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

        return redirect()->route('show_siswa');
    }
    public function destroy_siswa($id)
    {
        Siswa::find($id)->delete();
        return redirect()->route('show_siswa');
    }

    // kelas handler
    public function show_kelas()
    {
        $datas = Kelas::paginate(2);
        return view('admin.kelas.kelas', [
            "title" => "Kelas",
            "datas" => $datas
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
}
