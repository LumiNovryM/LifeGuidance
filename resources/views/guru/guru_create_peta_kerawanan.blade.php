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
            <form action="{{ route('guru_store_peta_kerawanan') }}" method="POST">
                @csrf
                <div class="">
                    <h6>Nama</h6>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=""
                        value="{{ $siswa->name }}" readonly>
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder=""
                        value="{{ $siswa->id }}" readonly name="siswa_id">
                </div>
                <div class="mt-4">
                    <h6>Kelas</h6>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=""
                        value="{{ $siswa->kelas->name }}" readonly>
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder=""
                        value="{{ $siswa->kelas->id }}" readonly name="kelas_id">

                </div>
                <div class="mt-4">
                    <h6>Nama Guru BK</h6>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=""
                        value="{{ $guru->name }}" readonly>
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder=""
                        value="{{ $guru->id }}" readonly name="guru_id">
                </div>
                <div class="mt-4">
                    <h6>Nama Wali Kelas</h6>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=""
                        value="{{ $walas->name }}" readonly>
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder=""
                        value="{{ $walas->id }}" readonly name="walas_id">
                </div>
                <div class="mt-4">
                    <h6>Peta Kerawanan</h6>
                    <div>
                        <table cellpadding="10" cellspacing="0">
                            <tr>
                                <td>Sering Sakit</td>
                                <td>
                                    <select name="sering_sakit" id="">
                                        <option value="0">Tidak
                                        </option>
                                        <option value="1">Iya
                                        </option>
                                    </select>
                                </td>
                                <td>Sering Izin</td>
                                <td>
                                    <select name="sering_izin" id="">
                                        <option value="0">Tidak
                                        </option>
                                        <option value="1">Iya
                                        </option>
                                    </select>
                                </td>
                                <td>Sering Alpha</td>
                                <td>
                                    <select name="sering_alpha" id="">
                                        <option value="0">Tidak
                                        </option>
                                        <option value="1">Iya
                                        </option>
                                    </select>
                                </td>
                                <td>Sering Terlambat</td>
                                <td>
                                    <select name="sering_terlambat" id="">
                                        <option value="0">
                                            Tidak</option>
                                        <option value="1">Iya
                                        </option>
                                    </select>
                                </td>
                                <td>Sering Bolos</td>
                                <td>
                                    <select name="bolos" id="">
                                        <option value="0">Tidak</option>
                                        <option value="1">Iya</option>
                                    </select>
                                </td>

                            </tr>
                            <tr style="text-align: center;">
                                <td>Kelainan Jasmani</td>
                                <td>
                                    <select name="kelainan_jasmani" id="">
                                        <option value="0">Tidak</option>
                                        <option value="1">Iya
                                        </option>
                                    </select>
                                </td>
                                <td>Minat Belajar Kurang</td>
                                <td>
                                    <select name="minat_belajar_kurang" id="">
                                        <option value="0">Tidak</option>
                                        <option value="1">Iya</option>
                                    </select>
                                </td>
                                <td>Introvert</td>
                                <td>
                                    <select name="introvert" id="">
                                        <option value="0">Tidak
                                        </option>
                                        <option value="1">Iya
                                        </option>
                                    </select>
                                </td>
                                <td>Tinggal Dengan Wali</td>
                                <td>
                                    <select name="tinggal_dengan_wali" id="">
                                        <option value="0">
                                            Tidak</option>
                                        <option value="1">
                                            Iya</option>
                                    </select>
                                </td>
                                <td>Kemampuan Kurang</td>
                                <td>
                                    <select name="kemampuan_kurang" id="">
                                        <option value="0">
                                            Tidak</option>
                                        <option value="1">Iya
                                        </option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="mt-4">
                            <a href="{{ route('guru_peta_kerawanan') }}" type="button"
                                class="btn btn-primary">Kembali</a>

                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
