<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Carbon;
use App\Models\Bimbingan_Karir;
use App\Models\Bimbingan_Sosial;
use App\Models\Bimbingan_Belajar;
use App\Models\Bimbingan_Pribadi;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Walas;

class NoTokenApiController extends Controller
{
    //list
    public function bimbingan_pribadi($id)
    {
        $datas = Bimbingan_Pribadi::with('siswa', 'guru', 'walas', 'kelas')->where('siswa_id', $id)->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function bimbingan_belajar($id)
    {
        $datas = Bimbingan_Belajar::with('siswa', 'guru', 'walas', 'kelas')->where('siswa_id', $id)->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function bimbingan_sosial($id)
    {
        $datas = Bimbingan_Sosial::with('siswa', 'guru', 'walas', 'kelas')->where('siswa_id', $id)->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function bimbingan_karir($id)
    {
        $datas = Bimbingan_Karir::with('siswa', 'guru', 'walas', 'kelas')->where('siswa_id', $id)->get();
        if ($datas) {
            return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }



    // post data
    public function tambah_bimbingan_pribadi(Request $request)
    {

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

        return ApiFormatter::createApi(200, 'Data berhasil ditambahkan');
    }

    public function tambah_bimbingan_belajar(Request $request)
    {
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

        return ApiFormatter::createApi(200, 'Data berhasil ditambahkan');
    }

    public function tambah_bimbingan_sosial(Request $request)
    {
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

        return ApiFormatter::createApi(200, 'Data berhasil ditambahkan');
    }

    public function tambah_bimbingan_karir(Request $request)
    {
        Bimbingan_Karir::insert([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'walas_id' => $request->walas_id,
            'guru_id' => $request->guru_id,
            'tipe_bimbingan' => $request->tipe_bimbingan,
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'status' => 'Menunggu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 

        return ApiFormatter::createApi(200, 'Data berhasil ditambahkan');
    }



    
    // delete data
    public function hapus_bimbingan_pribadi($id)
    {
        $bimbingan = Bimbingan_Pribadi::find($id);

        if (!$bimbingan) {
            return ApiFormatter::createApi(404, 'Data tidak ditemukan');
        }

        $bimbingan->delete();

        return ApiFormatter::createApi(200, 'Data berhasil dihapus');
    }

    public function hapus_bimbingan_belajar($id)
    {
        $bimbingan = Bimbingan_Belajar::find($id);

        if (!$bimbingan) {
            return ApiFormatter::createApi(404, 'Data tidak ditemukan');
        }

        $bimbingan->delete();

        return ApiFormatter::createApi(200, 'Data berhasil dihapus');
    }

    public function hapus_bimbingan_sosial($id)
    {
        $bimbingan = Bimbingan_Sosial::find($id);

        if (!$bimbingan) {
            return ApiFormatter::createApi(404, 'Data tidak ditemukan');
        }

        $bimbingan->delete();

        return ApiFormatter::createApi(200, 'Data berhasil dihapus');
    }

    public function hapus_bimbingan_karir($id)
    {
        $bimbingan = Bimbingan_Karir::find($id);

        if (!$bimbingan) {
            return ApiFormatter::createApi(404, 'Data tidak ditemukan');
        }

        $bimbingan->delete();

        return ApiFormatter::createApi(200, 'Data berhasil dihapus');
    }




    // update data
    public function ubah_bimbingan_pribadi(Request $request, $id)
    {
        $request->validate([
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        // Find the data to update
        $bimbingan_pribadi = Bimbingan_Pribadi::find($id);

        if (!$bimbingan_pribadi) {
            return ApiFormatter::createApi(404, 'Data not found');
        }

        // Update the data
        $bimbingan_pribadi->update([
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'updated_at' => Carbon::now()
        ]);

        return ApiFormatter::createApi(200, 'Data berhasil diubah');
    }    
    public function ubah_bimbingan_belajar(Request $request, $id)
    {
        $request->validate([
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        // Find the data to update
        $bimbingan_belajar = Bimbingan_Belajar::find($id);

        if (!$bimbingan_belajar) {
            return ApiFormatter::createApi(404, 'Data not found');
        }

        $bimbingan_belajar->update([
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'updated_at' => Carbon::now()
        ]);

        return ApiFormatter::createApi(200, 'Data berhasil diubah');
    }

    public function ubah_bimbingan_sosial(Request $request, $id)
    {
        $request->validate([
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        // Find the data to update
        $bimbingan = Bimbingan_Sosial::find($id);

        if (!$bimbingan) {
            return ApiFormatter::createApi(404, 'Data not found');
        }

        $bimbingan->update([
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'updated_at' => Carbon::now()
        ]);

        return ApiFormatter::createApi(200, 'Data berhasil diubah');
    }

    public function ubah_bimbingan_karir(Request $request, $id)
    {
        $request->validate([
            'alasan_pertemuan' => 'required',
            'tanggal_pertemuan' => 'required',
            'lokasi_pertemuan' => 'required',
        ]);

        // Find the data to update
        $bimbingan = Bimbingan_Karir::find($id);

        if (!$bimbingan) {
            return ApiFormatter::createApi(404, 'Data not found');
        }

        $bimbingan->update([
            'alasan_pertemuan' => $request->alasan_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'lokasi_pertemuan' => $request->lokasi_pertemuan,
            'updated_at' => Carbon::now()
        ]);

        return ApiFormatter::createApi(200, 'Data berhasil diubah');
    }

    // count
    public function count_bimbingan_pribadi($id) {
        $datas = Bimbingan_Pribadi::where('siswa_id', $id)->get();
        $count = $datas->count();

        if ($datas) {
        return ApiFormatter::createApi(200, 'Success', $count);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function count_bimbingan_belajar($id) {
        $datas = Bimbingan_Belajar::where('siswa_id', $id)->get();
        $count = $datas->count();

        if ($datas) {
        return ApiFormatter::createApi(200, 'Success', $count);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function count_bimbingan_sosial($id) {
        $datas = Bimbingan_Sosial::where('siswa_id', $id)->get();
        $count = $datas->count();

        if ($datas) {
        return ApiFormatter::createApi(200, 'Success', $count);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function count_bimbingan_karir($id) {
        $datas = Bimbingan_Karir::where('siswa_id', $id)->get();
        $count = $datas->count();

        if ($datas) {
        return ApiFormatter::createApi(200, 'Success', $count);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }





    // get data walas dan guru
    public function get_guru() {
        $datas = Guru::get();

        if ($datas) {
        return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function get_walas() {
        $datas = Walas::get();

        if ($datas) {
        return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function get_siswa() {
        $datas = Siswa::get();

        if ($datas) {
        return ApiFormatter::createApi(200, 'Success', $datas);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

}
