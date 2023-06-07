@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
<div class="row">
    <div class="col-md-6 mb-3">
        <form style="" action="{{ route('store_kelas') }}" method="post" class="d-flex">
            @csrf
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Nama" name="name" style="flex: 1;">
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        @error('name')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        @foreach ($datas as $data)    
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Kelas {{ $data->name }}</h5>
                <p class="card-text">Wali Kelas: LeBron James</p>
                <p class="card-text">Guru BK: Paul Pogba</p>
                <p class="card-text">Total Siswa: 33</p>
                <div class="d-flex justify-content-end">
                    <form style="margin-right: 10px" action="{{ route('destroy_kelas', $data->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger mr-2">Delete</button>
                    </form>
                    <a href="{{ route('edit_kelas', $data->id) }}" style="margin-right: 10px">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </a>
                    <a href="{{ route('show_siswa') }}">
                        <button type="button" class="btn btn-info">View</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{ $datas->links() }}
@endsection
