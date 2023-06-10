    @extends('layout.template.walas_dashboard')

@section('title-tab', 'LifeGuidance')

@section('walas_content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between" style="width: 100%">
                <h5 class="font-bold">Peta Kerawanan</h5>
            </div>
        </div>
        <div class="card-body">
            @if ($data )
            <div class="">
                <h6>Nama</h6>
                <p>{{ $data->siswa->name }}</p>
            </div>
            <div class="mt-2">
                <h6>Kelas</h6>
                <p>{{ $data->kelas->name }}</p>
            </div>
            <div class="mt-2">
                <h6>Nama Guru BK</h6>
                <p>{{ $data->guru->name }}</p>
            </div>
            <div class="mt-2">
                <h6>Nama Wali Kelas</h6>
                <p>{{ $data->walas->name }}</p>
            </div>
            <div class="mt-2">
                <h6>Peta Kerawanan</h6>
                <div>
                    <form action="{{ route('walas_update_peta_kerawanan', $data->id) }}" method="POST">
                        @csrf
    <table cellpadding="10" cellspacing="0">
        <tr >
          <td>Sering Sakit</td>
          <td>
            <select name="sering_sakit" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>
          <td>Sering Izin</td>
          <td>
            <select name="sering_izin" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>
          <td>Sering Alpha</td>
          <td>
            <select name="sering_alpha" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>
          <td>Sering Terlambat</td>
          <td>
            <select name="sering_terlambat" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>
          <td>Sering Bolos</td>
          <td>
            <select name="bolos" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>

        </tr>
        <tr style="text-align: center;">
          <td>Kelainan Jasmani</td>
          <td>
            <select name="kelainan_jasmani" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>
          <td>Minat Belajar Kurang</td>
          <td>
            <select name="minat_belajar_kurang" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>
          <td>Introvert</td>
          <td>
            <select name="introvert" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>
          <td>Tinggal Dengan Wali</td>
          <td>
            <select name="tinggal_dengan_wali" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>
          <td>Kemampuan Kurang</td>
          <td>
            <select name="kemampuan_kurang" id="">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
          </td>
        </tr>
      </table>
                                <button type="submit" class="btn btn-warning">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
            

    
            @else
            <h3 class="text-center">Peta Kerawanan Pada Murid Ini Belum Tersedia</h3>

           
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('walas_peta_kerawanan') }}" type="button" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
