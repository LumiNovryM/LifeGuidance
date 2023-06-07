<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Walas;
use Illuminate\Http\Request;

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
        return view('admin.walas', [
            "datas" => $datas,
            "title" => "Wali Kelas"
        ]);
    }
    public function create_walas()
    {
        return view('admin.create_walas', [
            "title" => "Wali Kelas"
        ]);
    }
    public function store_walas(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'password' => 'required',
        ]);

        Walas::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'password' => $request->password,
        ]);

        return redirect()->route('show_walas');
    }
    public function edit_walas($id)
    {
        $data = Walas::query()->where('id', $id)->first();   
        return view('admin.edit_walas', [
            "data" => $data,
            "title" => "Wali Kelas"
        ]);
    }
    public function update_walas(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'password' => $request->password,
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
        return view('admin.guru_bk', [
            "datas" => $datas,
            "title" => "Guru BK"
        ]);
    }
    public function create_guru_bk()
    {
        return view('admin.create_guru_bk', [
            "title" => "Guru BK"
        ]);
    }
    public function store_guru_bk(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'password' => 'required',
        ]);

        Guru::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'password' => $request->password,
        ]);

        return redirect()->route('show_guru_bk');
    }
    public function edit_guru_bk($id)
    {
        $data = Guru::query()->where('id', $id)->first();   
        return view('admin.edit_guru_bk', [
            "data" => $data,
            "title" => "Guru BK"
        ]);
    }
    public function update_guru_bk(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'password' => $request->password,
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
        $datas = User::query()->get();   
        return view('admin.siswa', [
            "datas" => $datas,
            "title" => "Guru BK"
        ]);
    }
    public function create_siswa()
    {
        return view('admin.create_siswa', [
            "title" => "Guru BK"
        ]);
    }
    public function store_siswa(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'role_id'=> 2,
            'password' => $request->password,
        ]);

        return redirect()->route('show_siswa');
    }
    public function edit_siswa($id)
    {
        $data = User::query()->where('id', $id)->first();   
        return view('admin.edit_siswa', [
            "data" => $data,
            "title" => "Guru BK"
        ]);
    }
    public function update_siswa(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'password' => $request->password,
        ];

        User::where('id', $id)->update($data);

        return redirect()->route('show_siswa');
    }
    public function destroy_siswa($id)
    {
        User::find($id)->delete();
        return redirect()->route('show_siswa');
    }
}
