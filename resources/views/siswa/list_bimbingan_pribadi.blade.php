@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
@foreach ($datas as $data)
<div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2 my-3">
    <div class="d-flex justify-content-between">
      <a href="{{ route('detail_bimbingan_belajar', $data->id) }}" class="font-weight-bold text-decoration-none hover:text-yellow-800">{{ $data->alasan_pertemuan }}</a>
        <div class="text-yellow-600 text-xs">{{ $data->status }}</div>
    </div>
    <div class="text-sm text-gray-600">
      <p>Guru BK  : {{ $data->nama_guru_bk }}</p>
      <div class="d-flex">
        <p>{{ $data->nama_siswa }}, <p>{{ $data->created_at }}</p></p>
      </div>
    </div>
  </div>
@endforeach
@endsection
