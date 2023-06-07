@extends('layout.template.dashboard')
@section('admin_content')
    <form action="{{ route('store_siswa') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NISN</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="nisn">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Primary</button>

    </form>
@endsection
