@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
<h4>Arsip Bimbingan</h4>
    <div class="container mt-2">
        <div class="row">
            @foreach ($datas as $data)
            <div class="col-md-4 mt-3">
                <a href="{{ route('kelas_arsip', $data->id) }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->name }}</h5>
                            <p class="card-text">Arsip Bimbingan Kelas {{ $data->name }}</p>
                        </div>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-5">
        {{ $datas->links() }}
    </div>
@endsection
