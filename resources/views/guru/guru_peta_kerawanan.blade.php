@extends('layout.template.guru_dashboard')

@section('title-tab', 'LifeGuidance')

@section('guru_content')
    <h4>Kelas Asuhan {{Auth::guard()->user()->name }}</h4>
    <div class="container">
        <div class="row">
            @foreach ($datas as $data)
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data['name'] }}</h5>
                            <a href="{{ route('guru_list_peta_kerawanan', $data['id']) }}" class="card-text">Lihat Peta Kerawanan.</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
