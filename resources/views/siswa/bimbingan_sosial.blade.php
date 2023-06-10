@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
@include('layout.modals.bimbingan_sosial')

@forelse ($datas as $data)
<div class="card mt-5">
  <div class="card-body">
      <h5 class="card-title">Pertemuan Bimbingan Sosial</h5>
      <p class="card-text">
          <strong>Tema:</strong> {{ $data->alasan_pertemuan }}<br>
          <strong>Pembuat Pertemuan:</strong> {{ $data->siswa->name }}<br>
          <strong>Guru Bk:</strong> {{ $data->guru->name }}<br>
          <strong>Status:</strong> {{ $data->status }}<br>

          @if ($data->status != 'Menunggu')
          <strong>Tanggal dan Tempat:</strong> 12 June 2023, Meeting Room 1
          @endif
          
      </p>
      <a href="{{ route('detail_bimbingan_sosial', $data->id) }}" class="btn">Show Details</a>
  </div>
</div>
@empty
<h3>Kamu Belum Memiliki Bimbingan Sosial</h3>

@endforelse
<div class="">
    {{ $datas->links() }}
</div>
@endsection
