@extends('layout.template.dashboard')
@section('admin_content')
<a href="{{ route('create_walas') }}">
    <button type="button" class="btn btn-info">Create</button>
</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">NIP</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
            $i = 1
        @endphp
        @foreach ($datas as $data)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->nip }}</td>
            <td >
                <form action="walas/destroy/{{ $data->id }}" method="POST">
                    @csrf
                    <button class="btn btn-icon btn-2 btn-danger" type="submit">
                        <span class="btn-inner--icon"><i class="ni ni-bulb-61"></i></span>
                    </button>
                </form>
                <a href="{{ route('edit_walas', $data->id) }}">
                    <button class="btn btn-icon btn-2 btn-warning" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bulb-61"></i></span>
                    </button>
                </a>
            </td>
        </tr>
      @endforeach
     
    </tbody>
  </table>
@endsection
