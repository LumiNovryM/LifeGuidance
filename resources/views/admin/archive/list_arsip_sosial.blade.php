@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
    <a href="{{ route('kelas_arsip', $id) }}" type="button" class="btn btn-primary mt-2">Kembali</a>
    @forelse ($datas as $data)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Bimbingan Sosial</h5>
                <p class="card-text">
                    <strong>Tema:</strong> {{ $data->alasan_pertemuan }}<br>
                    <strong>Kelas:</strong> {{ $data->kelas->name }}<br>
                    <strong>Wali Kelas:</strong> {{ $data->walas->name }}<br>
                    <strong>Status:</strong> {{ $data->status }}<br>
                    <strong>Tanggal dan Tempat:</strong> {{ $data->lokasi_pertemuan }}, {{ $data->tanggal_pertemuan }}
                </p>
                <div class="d-flex justify-content-between" style="width: 15vw">
                    <a href="{{ route('detail_arsip_sosial', [$data->id,$id]) }}" class="btn btn-info">Informasi</a>

                </div>
            </div>
        </div>
    @empty
        <h3>Arsip Ini Masih Kosong</h3>
    @endforelse
@endsection
