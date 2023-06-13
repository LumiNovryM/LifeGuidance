@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
    <div class="row">
        <div class="col-md-6 mb-3">
            <form action="{{ route('store_kelas') }}" method="post" class="d-flex">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" autocomplete="off" class="form-control"
                        placeholder="Masukkan Nama Kelas" aria-label="Recipient's username"
                        aria-describedby="button-addon2">
                    <button class="btn bg-gradient-primary mb-0" type="button" id="button-addon2">Submit</button>
                </div>
            </form>
            @error('name')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>


    <div class="row justify-content-center">
        @foreach ($datas as $data)
            <div class="col-6">
                <div class="card mb-3" style="max-width: 22rem;">
                    <div class="card-body">
                        <h5 class="card-title">Kelas {{ $data->name }}</h5>
                        @if (!isset($data->walas))
                        <p class="card-text">Wali Kelas: -</p>
                        @else
                        <p class="card-text">Wali Kelas: {{ $data->walas->name }}</p>
                        @endif
                        @foreach ($data->guru as $item)
                            @if (!$item->name)
                                <p class="card-text">Guru BK: -</p>
                            @else    
                                <p class="card-text">Guru BK: {{ $item->name }}</p>
                            @endif
                        @endforeach
                        <p class="card-text">Total Siswa: 33</p>
                        <div class="d-flex justify-content-center mt-3">
                            <form style="margin-right: 10px" action="{{ route('destroy_kelas', $data->id) }}"
                                method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm bg-gradient-danger mr-2">Delete</button>
                            </form>
                            <a href="{{ route('edit_kelas', $data->id) }}" style="margin-right: 10px">
                                <button type="submit" class="btn btn-sm bg-gradient-warning">Edit</button>
                            </a>
                            <a href="{{ route('show_siswa', $data->id) }}">
                                <button type="button" class="btn btn-sm bg-gradient-info">View</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    <div class="mt-6">
        {{ $datas->links() }}
    </div>
    <script>
        @if (session('message'))
            toastr.options = {
                "positionClass": "toast-top-right",
                "timeOut": 4000,
                "toastClass": "toast-primary",
            };
  
            toastr.success('{{ session('message') }}');
        @endif
    </script>
@endsection
