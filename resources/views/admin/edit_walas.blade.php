@extends('layout.template.dashboard')
@section('admin_content')
    <form action="{{ route('update_walas', $data->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="name" value="{{ $data->name }}">
            @error('name')
            <p style="color: red; font-size: 12px">*{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ $data->email }}">
            @error('email')
            <p style="color: red; font-size: 12px">*{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIP</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="nip" value="{{ $data->nip }}">
            @error('nip')
            <p style="color: red; font-size: 12px">*{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="password">
            @error('password')
            <p style="color: red; font-size: 12px">*{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Primary</button>

    </form>
@endsection
