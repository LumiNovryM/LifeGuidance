@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
<form action="{{ route('store_kelas') }}" method="post" class="col-md-6 d-flex">
    @csrf
    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan Nama" name="name">
    @error('name')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
    <button type="submit">
        submit
    </button>
</form>
<div class="col-md-6 d-flex">

    @foreach ($datas as $data)    
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <p>Kelas {{ $data->name }}</p>
                <p class="card-text">Wali Kelas : LeBron James</p>
                <p class="card-text">Guru BK : Paul Pogba</p>
                <p class="card-text">Total Siswa :33 </p>
                <div class="col-md-6 d-flex">
                    <form action="{{ route('destroy_kelas', $data->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">del</button>
                    </form>
                    <a href="{{ route('edit_kelas', $data->id) }}" class="btn btn-warning">edit</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $datas->links() }}

@endsection
