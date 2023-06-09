@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
    <div class="card">
        <div class="card-body mt-3">
            <h5 class="card-title">Lihat Pertemuan</h5>
            <p class="card-text">This is a cool Bootstrap card. You can customize it according to your needs.</p>
            <a href="{{ route('list_bimbingan_belajar') }}" class="btn">Lihat Pertemuan</a>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Buat Bimbingan Belajar</h5>
            <p class="card-text">This is a cool Bootstrap card. You can customize it according to your needs.</p>
            <a href="{{ route('create_bimbingan_belajar', Auth::user()->id) }}" class="btn">Buat Bimbingan</a>
        </div>
    </div>
    {{-- <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2 my-3">
        <div class="d-flex justify-content-between">
          <a href="" class="font-weight-bold text-decoration-none hover:text-yellow-800">bisa</a>
            <div class="text-yellow-600 text-xs">data</div>
        </div>
        <div class="text-sm text-gray-600">
          <p>data</p>
        </div>
      </div> --}}
      
@endsection
