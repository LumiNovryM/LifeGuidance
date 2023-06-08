@extends('layout.template.siswa_dashboard')

@section('title-tab','LifeGuidance')

@section('siswa_content')
<form action="" method="post">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Nama" name="name">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Kelas</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Kelas" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Guru BK</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Guru" name="nip">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Alasan Pertemuan</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Alasan pertemuan" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection