<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Tambah Bimbingan Karir
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
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
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                            readonly value="{{ $user->id }}" name="siswa_id">
                        @error('siswa_id')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                            placeholder="Masukkan Kelas" readonly value="{{ $user->kelas->name }}">
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                            readonly value="{{ $user->kelas->id }}" name="kelas_id">
                        @error('kelas_id')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Wali Kelas</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                            placeholder="Masukkan " readonly value="{{ $walas->name }}">
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                            readonly value="{{ $walas->id }}" name="walas_id">
                        @error('walas_id')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Guru BK</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                            placeholder="Masukkan " readonly value="{{ $guru->name }}">
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                            readonly value="{{ $guru->id }}" name="guru_id">
                        @error('walas_id')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipe Bimbingan</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="tipe_bimbingan">
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
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pertemuan</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                            placeholder="Masukkan Tanggal" name="tanggal_pertemuan">
                        @error('tanggal_pertemuan')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Lokasi Pertemuan</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off"
                            placeholder="Masukkan Lokasi Pertemuan" name="lokasi_pertemuan">
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
