<?php

namespace App\Http\Controllers;

use App\Models\Walas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home_admin()
    {
        return view('admin.home_admin');
    }
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
}
