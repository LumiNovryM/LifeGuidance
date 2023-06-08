<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Bimbingan_Belajar;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Pribadi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function home_siswa(){
        return view('siswa.siswa', [
            'title' => 'Dashboard',
        ]);
    }
    
    
    #bimbiangan_pribadi
    public function show_bimbingan_pribadi(){
        return view('siswa.bimbingan_pribadi',[
            'title' => 'Bimbingan Pribadi',
        ]);   
    }

    public function show_list_bimbingan_pribadi(){
        $id = 'Solokov';
        $datas = Bimbingan_Pribadi::where('nama_siswa', $id)->get();
        return view('siswa.list_bimbingan_pribadi',[
            'title' => 'Bimbingan Pribadi',
            'datas' => $datas
        ]);
    }

    public function show_form_bimbingan_pribadi($id){
        $data = Siswa::where('id', $id)->first();
        $data2 = Walas::where('kelas_id', $data->kelas->id)->first();
        $nama = $data->name;
        $kelas = $data->kelas->name;
        $walas = $data2->name;
        return view('siswa.form_bimbingan_pribadi',[
            'title' => 'Bimbingan Pribadi',
            'nama' => $nama,
            'kelas' => $kelas,
            'walas' => $walas
        ]);
    }
    public function store_bimbingan_pribadi(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nama_kelas' => 'required',
            'nama_walas' => 'required',
            'alasan_pertemuan' => 'required',
        ]);

        Bimbingan_Pribadi::insert([
            'nama_siswa' => $request->nama_siswa,
            'nama_kelas' => $request->nama_kelas,
            'nama_walas' => $request->nama_walas,
            'nama_guru_bk' => 'tes',
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'status' => 'Menunggu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('show_bimbingan_pribadi');
    }
    public function detail_bimbingan_pribadi($id)
    {
        $data = Bimbingan_Pribadi::where('id', $id)->first();
        return view('siswa.detail_bimbingan_belajar', [
            'title' => 'Bimbingan Pribadi',
            'data' => $data,
        ]);
    }
    
    //bimbingan belajar
    public function bimbingan_belajar(){
        return view('siswa.bimbingan_belajar', [
            'title' => 'Belajar',
        ]);
    }
    public function list_bimbingan_belajar()
    {
        $id = 'Solokov';
        $datas = Bimbingan_Belajar::where('nama_siswa', $id)->get();
        return view('siswa.list_bimbingan_belajar', [
            'title' => 'Belajar',
            'datas' => $datas,
        ]);
    }
    public function create_bimbingan_belajar($id){
        $data = Siswa::where('id', $id)->first();
        $data2 = Walas::where('kelas_id', $data->kelas->id)->first();
        $nama = $data->name;
        $kelas = $data->kelas->name;
        $walas = $data2->name;
        // dd($walas);
        return view('siswa.create_bimbingan_belajar', [
            'title' => 'Belajar',
            'nama' => $nama,
            'kelas' => $kelas,
            'walas' => $walas,
        ]);
    }
    public function store_bimbingan_belajar(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nama_kelas' => 'required',
            'nama_walas' => 'required',
            'alasan_pertemuan' => 'required',
        ]);

        Bimbingan_Belajar::insert([
            'nama_siswa' => $request->nama_siswa,
            'nama_kelas' => $request->nama_kelas,
            'nama_walas' => $request->nama_walas,
            'nama_guru_bk' => 'tes',
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'status' => 'Menunggu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('bimbingan_belajar');
    }
    public function detail_bimbingan_belajar($id)
    {
        $data = Bimbingan_Belajar::where('id', $id)->first();
        return view('siswa.detail_bimbingan_belajar', [
            'title' => 'Belajar',
            'data' => $data,
        ]);
    }

    // bimbingan sosial
    public function bimbingan_sosial(){
        return view('siswa.bimbingan_sosial', [
            'title' => 'Sosial',
        ]);
    }
    public function create_bimbingan_sosial(){
        $id = Auth::user()->id;
        $data = Siswa::where('id', $id)->first();
        $data2 = Walas::where('kelas_id', $data->kelas->id)->first();
        $diajak = Siswa::all();
        $nama = $data->name;
        $kelas = $data->kelas->name;
        $walas = $data2->name;
        // dd($walas);
        return view('siswa.create_bimbingan_sosial', [
            'title' => 'Belajar',
            'nama' => $nama,
            'kelas' => $kelas,
            'walas' => $walas,
            'diajak' => $diajak,
        ]);
    }
    public function store_bimbingan_sosial(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nama_kelas' => 'required',
            'nama_walas' => 'required',
            'diajukan' => 'required',
            'alasan_pertemuan' => 'required',
        ]);

        Bimbingan_Sosial::insert([
            'nama_siswa' => $request->nama_siswa,
            'nama_kelas' => $request->nama_kelas,
            'nama_walas' => $request->nama_walas,
            'nama_guru_bk' => 'tes',
            'diajukan' => $request->diajukan,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'status' => 'Menunggu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('bimbingan_sosial');
    }
    public function list_bimbingan_sosial()
    {
        $id = 'Solokov';
        $datas = Bimbingan_Sosial::where('nama_siswa', $id)->get();
        return view('siswa.list_bimbingan_sosial', [
            'title' => 'Sosial',
            'datas' => $datas,
        ]);
    }
    public function detail_bimbingan_sosial($id)
    {
        $data = Bimbingan_Sosial::where('id', $id)->first();
        
        return view('siswa.detail_bimbingan_sosial', [
            'title' => 'Sosial',
            'data' => $data,
        ]);
    }
}
