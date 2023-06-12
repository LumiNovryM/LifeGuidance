@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between" style="width: 100%">
                <h5 class="font-bold">Detail Pertemuan</h5>
                <p>{{ $data->status }}</p>
            </div>
        </div>

        <div class="card-body">
            <div class="">
                <h6>Nama</h6>
                <p>{{ $data->siswa->name }}</p>
            </div>
            <div class="">
                <h6>Rekan Yang Diajukan</h6>
                <p>{{ $diajukan->name }}</p>
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
                <h6>Alasan Pertemuan</h6>
                <textarea id="alasan" rows="4" class="form-control" placeholder="" name="alasan" readonly>{{ $data->alasan_pertemuan }}</textarea>

            </div>
            <div class="mt-2">
                <h6>Tanggal Pertemuan</h6>
                <p>{{ $data->tanggal_pertemuan }}</p>
            </div>
            <div class="mt-2">
                <h6>Lokasi Pertemuan</h6>
                <p>{{ $data->lokasi_pertemuan }}</p>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('bimbingan_sosial') }}" type="button" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
