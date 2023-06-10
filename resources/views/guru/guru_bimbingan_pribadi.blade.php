@extends('layout.template.guru_dashboard')

@section('title-tab', 'LifeGuidance')

@section('guru_content')
    @forelse ($datas as $data)
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Permohonan Bimbingan Pribadi</h5>
                <p class="card-text">
                    <strong>Tema:</strong> {{ $data->alasan_pertemuan }}<br>
                    <strong>Kelas:</strong> {{ $data->kelas->name }}<br>
                    <strong>Wali Kelas:</strong> {{ $data->walas->name }}<br>
                    <strong>Status:</strong> {{ $data->status }}<br>

                    @if ($data->status != 'Menunggu')
                        <strong>Tanggal dan Tempat:</strong> 12 June 2023, Meeting Room 1
                    @endif

                </p>
                <a href="{{ route('guru_detail_bimbingan_pribadi', $data->id) }}" class="btn">Action</a>
            </div>
        </div>
    @empty
        <h3>Kamu Belum Memiliki Bimbingan Pribadi</h3>
    @endforelse
    <div class="">
        {{ $datas->links() }}
    </div>
@endsection