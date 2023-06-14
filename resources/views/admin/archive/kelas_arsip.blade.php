@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
<h4>Tipe Bimbingan</h4>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-4">
                <a href="{{ route('list_arsip_pribadi', $id) }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Pribadi</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mt-4">
                <a href="{{ route('list_arsip_belajar', $id) }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Belajar</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mt-3">
                <a href="{{ route('list_arsip_sosial', $id) }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Sosial</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mt-3">
                <a href="{{ route('list_arsip_karir', $id) }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bimbingan Karir</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
