@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
    <form action="{{ route('update_siswa', $data->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="" name="name" value="{{ $data->name }}">
            @error('name')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="" name="email" value="{{ $data->email }}">
            @error('email')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NISN</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="" name="nisn" value="{{ $data->nisn     }}">
            @error('nisn')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input class="form-control" type="text" value={{ $kelas->name }} readonly>
            <input class="form-control" type="hidden" name="kelas_id" value={{ $kelas->id }} readonly>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Perbarui Password" name="password">
            @error('password')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn bg-gradient-primary">Submit</button>
        <a href="{{ url()->previous() }}" type="submit" class="btn bg-gradient-info">Cancel</a>

    </form>
@endsection
