@extends('layout.template.walas_dashboard')

@section('title-tab', 'LifeGuidance')

@section('walas_content')
<h5>Permohonan Bimbingan Pribadi Kelas {{ $kelas }}</h5>
@forelse ($datas as $data)
<div class="card mt-3">
  <div class="card-body">
      <h5 class="card-title">Pertemuan Bimbingan Pribadi</h5>
      <p class="card-text">
          <strong>Tema:</strong> {{ $data->alasan_pertemuan }}<br>
          <strong>Guru Bk:</strong> {{ $data->guru->name }}<br>
          <strong>Wali Kelas:</strong> {{ $data->walas->name }}<br>
          <strong>Status:</strong> {{ $data->status }}<br>

          @if ($data->status != 'Menunggu')
          <strong>Tanggal dan Tempat:</strong> {{ $data->lokasi_pertemuan }}, {{ $data->tanggal_pertemuan }}
          @endif
          
      </p>
      <a href="{{ route('walas_detail_bimbingan_pribadi', $data->id) }}" class="btn">Show Details</a>
  </div>
</div>
@empty
<h1>kosong</h1>

@endforelse
<div class="">
    {{ $datas->links() }}
</div>
@endsection
