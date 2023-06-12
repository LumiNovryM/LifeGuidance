@extends('layout.template.guru_dashboard')

@section('title-tab', 'LifeGuidance')

@section('guru_content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between" style="width: 100%">
                <h5 class="font-bold">Peta Kerawanan</h5>
            </div>
        </div>
        <div class="card-body">
            @if ($data)
                <div class="">
                    <h6>Nama</h6>
                    <p>{{ $data->siswa->name }}</p>
                </div>
                <div class="mt-2">
                    <h6>Kelas</h6>
                    <p>{{ $data->kelas->name }}</p>
                </div>
                <div class="mt-2">
                    <h6>Nama Guru BK</h6>
                    <p>{{ $data->guru->name }}</p>
                </div>
                <div class="mt-2">
                    <h6>Nama Wali Kelas</h6>
                    <p>{{ $data->walas->name }}</p>
                </div>
                <div class="mt-2">
                    <h6>Peta Kerawanan</h6>
                    <div>
                        <form action="{{ route('guru_update_peta_kerawanan', $data->id) }}" method="POST">
                            @csrf
                            <table cellpadding="10" cellspacing="0">
                                <tr>
                                    <td>Sering Sakit</td>
                                    <td>
                                        <select name="sering_sakit" id="" class="form-control">
                                            <option {{ $data->sering_sakit == 0 ? 'selected' : '' }} value="0">Tidak
                                            </option>
                                            <option {{ $data->sering_sakit == 1 ? 'selected' : '' }} value="1">Iya
                                            </option>
                                        </select>
                                    </td>
                                    <td>Sering Izin</td>
                                    <td>
                                        <select name="sering_izin" id="" class="form-control">
                                            <option {{ $data->sering_izin == 0 ? 'selected' : '' }} value="0">Tidak
                                            </option>
                                            <option {{ $data->sering_izin == 1 ? 'selected' : '' }} value="1">Iya
                                            </option>
                                        </select>
                                    </td>
                                    <td>Sering Alpha</td>
                                    <td>
                                        <select name="sering_alpha" id="" class="form-control">
                                            <option {{ $data->sering_alpha == 0 ? 'selected' : '' }} value="0">Tidak
                                            </option>
                                            <option {{ $data->sering_alpha == 1 ? 'selected' : '' }} value="1">Iya
                                            </option>
                                        </select>
                                    </td>
                                    <td>Sering Terlambat</td>
                                    <td>
                                        <select name="sering_terlambat" id="" class="form-control">
                                            <option {{ $data->sering_terlambat == 0 ? 'selected' : '' }} value="0">
                                                Tidak</option>
                                            <option {{ $data->sering_terlambat == 1 ? 'selected' : '' }} value="1">Iya
                                            </option>
                                        </select>
                                    </td>
                                    <td>Sering Bolos</td>
                                    <td>
                                        <select name="bolos" id="" class="form-control">
                                            <option {{ $data->bolos == 0 ? 'selected' : '' }} value="0">Tidak</option>
                                            <option {{ $data->bolos == 1 ? 'selected' : '' }} value="1">Iya</option>
                                        </select>
                                    </td>

                                </tr>
                                <tr style="text-align: center;">
                                    <td>Kelainan Jasmani</td>
                                    <td>
                                        <select name="kelainan_jasmani" id="" class="form-control">
                                            <option {{ $data->kelainan_jasmani == 0 ? 'selected' : '' }} value="0">
                                                Tidak</option>
                                            <option {{ $data->kelainan_jasmani == 1 ? 'selected' : '' }} value="1">Iya
                                            </option>
                                        </select>
                                    </td>
                                    <td>Minat Belajar Kurang</td>
                                    <td>
                                        <select name="minat_belajar_kurang" id="" class="form-control">
                                            <option {{ $data->minat_belajar_kurang == 0 ? 'selected' : '' }}
                                                value="0">Tidak</option>
                                            <option {{ $data->minat_belajar_kurang == 1 ? 'selected' : '' }}
                                                value="1">Iya</option>
                                        </select>
                                    </td>
                                    <td>Introvert</td>
                                    <td>
                                        <select name="introvert" id="" class="form-control">
                                            <option {{ $data->introvert == 0 ? 'selected' : '' }} value="0">Tidak
                                            </option>
                                            <option {{ $data->introvert == 1 ? 'selected' : '' }} value="1">Iya
                                            </option>
                                        </select>
                                    </td>
                                    <td>Tinggal Dengan Wali</td>
                                    <td>
                                        <select name="tinggal_dengan_wali" id="" class="form-control">
                                            <option {{ $data->tinggal_dengan_wali == 0 ? 'selected' : '' }} value="0">
                                                Tidak</option>
                                            <option {{ $data->tinggal_dengan_wali == 1 ? 'selected' : '' }} value="1">
                                                Iya</option>
                                        </select>
                                    </td>
                                    <td>Kemampuan Kurang</td>
                                    <td>
                                        <select name="kemampuan_kurang" id="" class="form-control">
                                            <option {{ $data->kemampuan_kurang == 0 ? 'selected' : '' }} value="0">
                                                Tidak</option>
                                            <option {{ $data->kemampuan_kurang == 1 ? 'selected' : '' }} value="1">Iya
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <div class="">
                                <h6>Kesimpulan</h6>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="kesimpulan">{{ $data->kesimpulan }}</textarea>
                            </div>
                            <div class="mt-5">
                                <a href="{{ route('guru_peta_kerawanan') }}" type="button"
                                    class="btn btn-primary">Kembali</a>
                                <a href="{{ route('export_pdf', $data->id) }}" type="button"
                                    class="btn btn-danger">Eksport Pdf</a>
                                <button type="submit" class="btn btn-info">Ubah</button>
                            </div>
                    </div>
                    </form>
                </div>
        </div>
    @else
        <h4 class="text-center">Peta Kerawanan Pada Murid Ini Belum Tersedia</h4>
        <a href="{{ route('guru_create_peta_kerawanan', $ids) }}" type="button" class="btn btn-info">Buat Peta Kerawanan</a>
        @endif
    </div>

  
@endsection
