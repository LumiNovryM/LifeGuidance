@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
<h4>Buat Pertemuan Bimbingan Pribadi</h4>
<form action="{{ route('store_bimbingan_belajar') }}" method="post" class="mt-2">
  @csrf
  <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Nama" readonly value="{{ $nama->name }}">
      <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off" readonly value="{{ $nama->id }}" name="siswa_id">
          @error('nama_siswa')
          <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
  </div>
 
  <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Kelas</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Kelas" readonly value="{{ $kelas->kelas->name }}">
      <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off" readonly value="{{ $kelas->kelas->id }}" name="kelas_id">
          @error('nama_kelas')
          <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
  </div>

  {{-- <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Guru BK</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan " readonly value="{{ $walas->name }}">
    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" readonly value="{{ $walas->id }}" name="guru_bk_id">
        @error('nama_walas')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
  </div> --}}

  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Wali Kelas</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan " readonly value="{{ $walas->name }}">
    <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off" readonly value="{{ $walas->id }}" name="walas_id">
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
