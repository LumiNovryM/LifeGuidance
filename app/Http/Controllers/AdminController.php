<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Walas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home_admin()
    {
        return view('admin.home_admin');
    }

    // walas
    public function show_walas()
    {
        $datas = Walas::query()->get();   
        return view('admin.walas', compact('datas'));
    }
    public function create_walas()
    {
        return view('admin.create_walas');
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
        return view('admin.edit_walas', compact('data'));
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



    // guru bk
    public function show_guru_bk()
    {
        $datas = Guru::query()->get();   
        return view('admin.guru_bk', compact('datas'));
    }
    public function create_guru_bk()
    {
        return view('admin.create_guru_bk');
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
        return view('admin.edit_guru_bk', compact('data'));
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
}
