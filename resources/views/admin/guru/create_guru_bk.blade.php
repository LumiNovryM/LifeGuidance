@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
    <form action="{{ route('store_guru_bk') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                placeholder="Masukkan Nama" name="name">
            @error('name')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                placeholder="Masukkan Email" name="email">
            @error('email')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIP</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                placeholder="Masukkan NIP" name="nip">
            @error('nip')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                placeholder="Masukkan Password" name="password">
            @error('password')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Pilih Kelas Untuk Layanan Konseling</label>
            {{-- List Kelas X, XI, XII --}}
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#Xcollapse" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Kelas X
                        </a>
                    </div>
                    <div class="col">
                        <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#XIcollapse" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Kelas XI
                        </a>
                    </div>
                    <div class="col">
                        <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#XIIcollapse" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Kelas XII
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="container">
                {{-- List Kelas X --}}
                <div class="collapse" id="Xcollapse">
                    <div class="card card-body">
                        <div class="row">
                            @foreach ($kelas_sepuluh as $item)    
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="kelas_sepuluh[]" id="fcustomCheck1">
                                    <label class="custom-control-label" for="customCheck1">{{ $item->name }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- List Kelas XI --}}
                <div class="collapse" id="XIcollapse">
                    <div class="card card-body">
                        <div class="row">
                            @foreach ($kelas_sebelas as $item)    
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="kelas_sebelas[]" id="fcustomCheck1">
                                    <label class="custom-control-label" for="customCheck1">{{ $item->name }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- List Kelas XII --}}
                <div class="collapse" id="XIIcollapse">
                    <div class="card card-body">
                        <div class="row">
                            @foreach ($kelas_duabelas as $item)    
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="kelas_duabelas[]" id="fcustomCheck1">
                                    <label class="custom-control-label" for="customCheck1">{{ $item->name }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection
