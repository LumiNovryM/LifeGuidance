@extends('layout.template.siswa_dashboard')

@section('title-tab','LifeGuidance')

@section('siswa_content')
<div class="card mt-5">
    <div class="card-body">
      <h5 class="card-title">Lihat Pertemuan</h5>
      <p class="card-text">This is a cool Bootstrap card. You can customize it according to your needs.</p>
      <a href="{{ route('show_list_bimbingan_pribadi') }}" class="btn">Lihat Pertemuan</a>
    </div>
</div>
<div class="card mt-5">
    <div class="card-body">
      <h5 class="card-title">Buat Pertemuan Bimbingan Pribadi</h5>
      <p class="card-text">This is a cool Bootstrap card. You can customize it according to your needs.</p>
      <a href="{{ route('show_form_bimbingan_pribadi') }}" class="btn">Buat Pertemuan</a>
    </div>
</div>
@endsection