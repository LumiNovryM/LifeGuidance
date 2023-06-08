@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
@forelse ($datas as $data)
<div class="card mt-5">
  <div class="card-body">
      <h5 class="card-title">Pertemuan Bimbingan Pribadi</h5>
      <p class="card-text">
          <strong>Guru Bk:</strong> {{ $data->nama_guru_bk }}<br>
          <strong>Status:</strong> {{ $data->status }}<br>

          @if ($data->status != 'Menunggu')
          <strong>Tanggal dan Tempat:</strong> 12 June 2023, Meeting Room 1
          @endif
          
      </p>
      <a href="{{ route('detail_bimbingan_belajar', $data->id) }}" class="btn">Show Details</a>
  </div>
</div>
@empty
<h1>kosong</h1>

@endforelse
@endsection
