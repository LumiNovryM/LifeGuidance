<?php

namespace App\Http\Controllers;

use App\Models\Guru;
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
    public function show_siswa()
    {
        $datas = Siswa::query()->get();   
        return view('admin.siswa.siswa', [
            "datas" => $datas,
            "title" => "Siswa"
        ]);
    }
    public function create_siswa()
    {
        return view('admin.siswa.create_siswa', [
            "title" => "Siswa"
        ]);
    }
    public function store_siswa(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nisn' => 'required',
            'password' => 'required|min:8',
        ]);

        Siswa::insert([
            'name' => $request->name,
            'email' => $request->email,
            'nisn' => $request->nisn,
            'role_id'=> 2,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('show_siswa');
    }
    public function edit_siswa($id)
    {
        $data = Siswa::query()->where('id', $id)->first();   
        return view('admin.siswa.edit_siswa', [
            "data" => $data,
            "title" => "Siswa"
        ]);
    }
    public function update_siswa(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nisn' => 'required',
            'password' => 'required|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nisn' => $request->nisn,
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
}
