@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
<h4>Buat Pertemuan Bimbingan Pribadi</h4>
<form action="{{ route('store_bimbingan_pribadi') }}" method="post" class="mt-2">
  @csrf
  <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Nama" name="nama_siswa" readonly value="{{ $nama }}">
          @error('nama_siswa')
          <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
  </div>
 
  <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Kelas</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Kelas" name="nama_kelas" readonly value="{{ $kelas }}">
          @error('nama_kelas')
          <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
  </div>
  
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Wali Kelas</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan " name="nama_walas" value="{{ $walas }}">
        @error('nama_walas')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Alasan Pertemuan</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan_pertemuan" placeholder="Masukkan Alasan Pertemuan"></textarea>

        @error('alasan_pertemuan')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection