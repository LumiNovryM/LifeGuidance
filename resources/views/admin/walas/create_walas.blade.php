@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
    <form action="{{ route('store_walas') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Nama" name="name">
            @error('name')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Email" name="email">
            @error('email')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No Telp.</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                placeholder="Masukkan No Telp." name="no_telp">
            @error('no_telp')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIP</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan NIP" name="nip">
            @error('nip')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kelas Yang Diajar</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kelas_id">
                @foreach ($datas as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
              </select>
            @error('nip')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input class="form-control" type="password" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Password" name="password">
            @error('password')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn bg-gradient-primary">Submit</button>
        <a href="{{ route('show_walas') }}" type="submit" class="btn bg-gradient-info">Cancel</a>

    </form>
@endsection
