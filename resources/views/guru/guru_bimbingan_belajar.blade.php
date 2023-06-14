@extends('layout.template.guru_dashboard')

@section('title-tab', 'LifeGuidance')

@section('guru_content')
@if ($datas)
@include('layout.modals.guru.bimbingan_belajar')
@endif

    @forelse ($datas as $data)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Permohonan Bimbingan Belajar</h5>
                <p class="card-text">
                    <strong>Tema:</strong> {{ $data->alasan_pertemuan }}<br>
                    <strong>Kelas:</strong> {{ $data->kelas->name }}<br>
                    <strong>Wali Kelas:</strong> {{ $data->walas->name }}<br>
                    <strong>Status:</strong> {{ $data->status }}<br>

                    @if ($data->status != 'Menunggu')
                        <strong>Tanggal dan Tempat:</strong> {{ $data->lokasi_pertemuan }}, {{ $data->tanggal_pertemuan }}
                    @endif

                </p>
                @if ($data->status == 'Menunggu')
                    <div class="d-flex justify-content-between" style="width: 15vw">
                        <a href="{{ route('guru_detail_bimbingan_belajar', $data->id) }}" class="btn btn-danger">Tunda</a>
                        <form action="{{ route('guru_accept_bimbingan_belajar', $data->id) }}" method="post">
                            @csrf
                            <button class="btn btn-info " type="submit">Terima</button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('guru_detail_bimbingan_belajar', $data->id) }}" class="btn">Informasi</a>
                @endif
            </div>
        </div>
    @empty
        <h3>Permintaan Bimbingan Belajar Sedang Tidak Ada</h3>

    @endforelse
    <div class="">
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
