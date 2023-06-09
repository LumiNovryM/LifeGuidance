@extends('layout.template.walas_dashboard')

@section('title-tab', 'LifeGuidance')

@section('walas_content')
    <div class="card">
        <div class="card-header">
                <div class="d-flex justify-content-between" style="width: 100%">
                    <h5 class="font-bold">Detail Pertemuan</h5>
                    <p style="margin-left: 10px">{{ $data->status }}</p>
                </div>
        </div>
        <div class="card-body">
            <div class="">
                <h6>Nama Siswa</h6>
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

            @if ($data->alasan_pertemuan && $data->tanggal_pertemuan && $data->lokasi_pertemuan)
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
        @endif

        </div>
        <div class="card-footer">
            <a href="{{ route('walas_detail_bimbingan_pribadi') }}" type="button" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
