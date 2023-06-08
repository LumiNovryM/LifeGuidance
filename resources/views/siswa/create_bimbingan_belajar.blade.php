@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
<h4>Buat Pertemuan Bimbingan Belajar</h4>
<form action="" method="post" class="mt-2">
  @csrf
  <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Nama" name="name">
          @error('name')
          <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
  </div>
 
  <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Kelas</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Kelas" name="email">
          @error('email')
          <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
  </div>
  
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Guru BK</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan " name="email">
        @error('email')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Alasan Pertemuan</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Kelas" name="email">
        @error('email')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
