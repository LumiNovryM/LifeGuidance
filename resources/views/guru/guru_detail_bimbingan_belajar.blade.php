@extends('layout.template.guru_dashboard')

@section('title-tab', 'LifeGuidance')

@section('guru_content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between" style="width: 100%">
                <h5 class="font-bold">Permohonan Pertemuan Bimbingan Pribadi</h5>
            </div>
        </div>
        <form action="{{ route('guru_update_bimbingan_belajar', $data->id) }}" method="post">
            @csrf
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
                    <h6>Status</h6>
                    <p>{{ $data->status }}</p>
                </div>

                <div class="mt-2">
                    <h6>Alasan Pertemuan</h6>
                    <textarea id="alasan" rows="4" class="form-control" placeholder="" readonly>{{ $data->alasan_pertemuan }}</textarea>
                </div>
                <div class="mt-2">
                    <h6>Tanggal Pertemuan</h6>
                    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Tanggal Pertemuan"
                        name="tanggal_pertemuan" value="{{ $data->tanggal_pertemuan }}">
                    @error('tanggal_pertemuan')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <h6>Lokasi Pertemuan</h6>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Lokasi Pertemuan"
                        value="{{ $data->lokasi_pertemuan }}" name="lokasi_pertemuan" autocomplete="off">
                    @error('lokasi_pertemuan')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <h6>Alasan / Komentar</h6>
                    <textarea id="alasan" rows="4" class="form-control" placeholder="*Ditampilkan Di Siswa" name="alasan_guru">{{ $data->alasan_guru }}</textarea>
                    @error('alasan_guru')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <h6>Solusi & Hasil Konsultasi</h6>
                    <textarea id="alasan" rows="4" class="form-control" placeholder="*Ditampilkan Di Wali Kelas"
                        name="solusi_guru">{{ $data->solusi_guru }}</textarea>
                    @error('solusi_guru')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="card-footer d-flex justify-content-between" style="width: 25vw">
                <a href="{{ route('guru_bimbingan_belajar') }}" type="button" class="btn btn-primary">Kembali</a>
                <button type="submit" type="button" class="btn btn-info">Tunda</button>
            </form>
            <form action="{{ route('guru_finish_bimbingan_belajar', $data->id) }}" method="post">
                @csrf
                <button type="submit" type="button" class="btn btn-success ">Selesai</button>
            </form>
            </div>

    </div>
@endsection
