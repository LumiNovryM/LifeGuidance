@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
    <form action="{{ route('update_guru_bk', $data->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="" name="name" value="{{ $data->name }}">
            @error('name')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Motto</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                placeholder="Masukkan Motto" name="motto" value="{{ $data->motto }}">
            @error('motto')
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
            <label for="exampleFormControlInput1" class="form-label">NIP</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="" name="nip" value="{{ $data->nip }}">
            @error('nip')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No Telp.</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                placeholder="Masukkan No Telp." name="no_telp" value="{{ $data->no_telp }}">
            @error('no_telp')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" autocomplete="off" name="foto">
            @error('foto')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Perbarui Password" name="password">
            @error('password')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn bg-gradient-primary">Submit</button>
        <a href="{{ route('show_guru_bk') }}" type="submit" class="btn bg-gradient-info">Cancel</a>

    </form>
@endsection
