@extends('layout.template.walas_dashboard')

@section('title-tab', 'LifeGuidance')

@section('walas_content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between" style="width: 100%">
                <h5 class="font-bold">Peta Kerawanan</h5>
            </div>
        </div>
        <div class="card-body">
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
                    <form action="{{ route('walas_update_peta_kerawanan', $data->id) }}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <div class="d-flex">
                                <p>Sering Sakit</p>
                                <select name="sering_sakit" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <p>Sering Izin</p>
                                <select name="sering_izin" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <p>Sering Alpha</p>
                                <select name="sering_alpha" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <p>Sering Terlambat</p>
                                <select name="sering_terlambat" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <p>Sering Bolos</p>
                                <select name="bolos" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="d-flex">
                                <p>Kelainan Jasmani</p>
                                <select name="kelainan_jasmani" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <p>Minat Belajar Kurang</p>
                                <select name="minat_belajar_kurang" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <p>Introvert</p>
                                <select name="introvert" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <p>Tinggal Dengan Wali</p>
                                <select name="tinggal_dengan_wali" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <p>Kemampuan Kurang</p>
                                <select name="kemampuan_kurang" id="">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-warning">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>

           
        </div>
        <div class="card-footer">
            <a href="{{ route('walas_peta_kerawanan') }}" type="button" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
