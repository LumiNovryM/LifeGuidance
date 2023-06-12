<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Tambah Bimbingan Belajar
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Buat Pertemuan Bimbingan Belajar</h5>
          <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('guru_store_bimbingan_belajar') }}" method="post" class="mt-2">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <select name="siswa_id" id="" class="form-control">
                    @foreach ($names as $name)
                        <option value="{{ $name->id }}">{{ $name->name }}, {{ $name->kelas->name }}
                        </option>
                    @endforeach
                </select>
                @error('siswa_id')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alasan Pertemuan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan_pertemuan"
                    placeholder="Masukkan Alasan Pertemuan"></textarea>
                @error('alasan_pertemuan')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Tanggal Pertemuan</label>
              <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_pertemuan">
              @error('tanggal_pertemuan')
                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Lokasi Pertemuan</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="lokasi_pertemuan" placeholder="Masukkan Lokasi Pertemuan" autocomplete="off">
              @error('lokasi_pertemuan')
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