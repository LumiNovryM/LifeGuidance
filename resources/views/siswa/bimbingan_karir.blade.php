@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Tambah Bimbingan Karir
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Buat Pertemuan Bimbingan Karir</h5>
          <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('store_bimbingan_karir') }}" method="post" class="mt-2">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                        placeholder="Masukkan Nama" readonly value="{{ $user->name }}">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off" readonly
                        value="{{ $user->id }}" name="siswa_id">
                    @error('nama_siswa')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                        placeholder="Masukkan Kelas" readonly value="{{ $user->kelas->name }}">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off" readonly
                        value="{{ $user->kelas->id }}" name="kelas_id">
                    @error('nama_kelas')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
        
        
                {{-- <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Guru BK</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Masukkan " readonly value="{{ $walas->name }}">
            <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" readonly value="{{ $walas->id }}" name="guru_bk_id">
                @error('nama_walas')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
          </div> --}}
        
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Wali Kelas</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                        placeholder="Masukkan " readonly value="{{ $walas->name }}">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off" readonly
                        value="{{ $walas->id }}" name="walas_id">
                    @error('nama_walas')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tipe Bimbingan</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="tipe_bimbingan">
                        {{-- @foreach ($diajak as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}, {{ $item->kelas->name }}</option>
                        @endforeach --}}
                        <option value="Kerja">Kerja</option>
                        <option value="Wirausaha">Wirausaha</option>
                        <option value="Kuliah">Kuliah</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alasan Pertemuan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan_pertemuan"
                        placeholder="Masukkan Alasan Pertemuan"></textarea>
        
                    @error('alasan_pertemuan')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>

@forelse ($datas as $data)
<div class="card mt-5">
  <div class="card-body">
      <h5 class="card-title">Pertemuan Bimbingan Belajar</h5>
      <p class="card-text">
          <strong>Tema:</strong> {{ $data->alasan_pertemuan }}<br>
          <strong>Guru Bk:</strong> {{ $data->guru->name }}<br>
          <strong>Status:</strong> {{ $data->status }}<br>

          @if ($data->status != 'Menunggu')
          <strong>Tanggal dan Tempat:</strong> 12 June 2023, Meeting Room 1
          @endif
          
      </p>
      <a href="{{ route('detail_bimbingan_karir', $data->id) }}" class="btn">Show Details</a>
  </div>
</div>
@empty
<h3>Kamu Belum Memiliki Bimbingan Karir</h3>

@endforelse
<div class="">
    {{ $datas->links() }}
</div>
@endsection
