<!DOCTYPE html>
<html>
<head>
    <title> Peta Kerawanan {{ $data->siswa->name }}</title>
</head>
<body>
    <h1 style="text-align: center">Peta Kerawanan {{ $data->siswa->name }}</h1>

    <p>Nama = {{ $data->siswa->name }}</p>

    <p>alasan pertemuan = {{ $data->alasan_pertemuan }}</p>

    <p>solusi = {{ $data->solusi_guru }}</p>

    <p>Kelas = {{ $data->kelas->name }}</p>

    <p>Nama Guru Bk = {{ $data->guru->name }}</p>

    <p>Nama Wali Kelas = {{ $data->walas->name }}</p>

    <p>Kesimpulan = {{ $data->walas->name }}</p>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Sering Sakit</td>
                <td>{{ $data->sering_sakit == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sering Izin</td>
                <td>{{ $data->sering_izin == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sering Alpha</td>
                <td>{{ $data->sering_alpha == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Sering Terlambat</td>
                <td>{{ $data->sering_terlambat == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Bolos</td>
                <td>{{ $data->bolos == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Kelainan Jasmani</td>
                <td>{{ $data->kelainan_jasmani == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Minat Belajar Kurang</td>
                <td>{{ $data->minat_belajar_kurang == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Introvert</td>
                <td>{{ $data->introvert == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Tinggal Dengan Wali</td>
                <td>{{ $data->tinggal_dengan_wali == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Kemampuan Kurang</td>
                <td>{{ $data->kemampuan_kurang == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
