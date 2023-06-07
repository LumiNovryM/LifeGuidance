@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
    {{-- <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Siswa</h6>
                    <a href="{{ route('create_siswa') }}">
                        <button type="button" class="btn bg-gradient-info btn-sm">Create</button>
                    </a>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NISN</th>
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
                                            <div class="text-secondary d-flex">
                                                <form action="siswa/destroy/{{ $data->id }}" method="POST"
                                                    >
                                                    @csrf
                                                    <button class="btn btn-icon btn-2 bg-gradient-danger me-3" type="submit">
                                                        <span class="btn-inner--icon"><i class="ni ni-basket"></i></span>
                                                    </button>
                                                </form>
                                                <a href="{{ route('edit_siswa', $data->id) }}">
                                                    <button class="btn btn-icon btn-2 bg-gradient-warning" type="button">
                                                        <span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span>
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
    </div> --}}
@endsection
