@extends('layout.template.walas_dashboard')

@section('title-tab', 'LifeGuidance')

@section('walas_content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Peta Kerawanan Siswa Kelas {{ $kelas }}</h6>
                    <a class="btn btn-success" href="{{ route('export_excel_walas',$datas[0]->kelas_id) }}">Export Excel</a>

                    
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NISN
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>
                                            <div class="ms-3 text-secondary">
                                                <p class="text-secondary">{{ $loop->iteration }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-secondary">
                                                <p class="text-secondary">{{ $data->name }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-secondary">
                                                <p class="text-secondary">{{ $data->email }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-secondary">
                                                <p class="text-secondary">{{ $data->nisn }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-secondary">
                                                <p class="text-secondary">{{ $data->kelas->name }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-secondary d-flex">
                                                <a href="{{ route('walas_detail_peta_kerawanan', $data->id) }}">
                                                    <button class="btn btn-icon btn-2 bg-gradient-success" type="button">
                                                        <span class="btn-inner--icon"><i
                                                                class="ni ni-glasses-2"></i></span>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-secondary d-flex justify-content-center py-lg-3">
                                                <p class="text-secondary">Table Kosong</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $datas->links() }}
    </div>
    <script>
        @if (session('message'))
            toastr.success('{{ session('message') }}', 'Success');
        @endif
      </script>
@endsection
