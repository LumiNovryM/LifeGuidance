@extends('layout.template.walas_dashboard')

@section('title-tab', 'LifeGuidance')

@section('walas_content')
    <div class="d-flex justify-content-end" style="width: 100%">
        <h5 class="font-bold">Detail Pertemuan</h5>
        <p>{{ $data->status }}</p>
    </div>

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
        <h6>Orang Yang Bersangkutan</h6>
        <p>{{ $data->diajukan }}</p>
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
    <div class="mt-2">
        <h6>Tanggapan Guru</h6>
        <textarea id="alasan" rows="4" class="form-control" placeholder="" name="alasan" readonly>{{ $data->solusi_guru }}</textarea>
    </div>            

    <a href="{{ route('walas_list_bimbingan_sosial') }}" type="button" class="btn btn-primary">Kembali</a>
@endsection
