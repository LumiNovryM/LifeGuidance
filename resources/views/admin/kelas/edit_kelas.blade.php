@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
    <form action="{{ route('update_kelas', $data->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="" name="name" value="{{ $data->name }}">
            @error('name')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
