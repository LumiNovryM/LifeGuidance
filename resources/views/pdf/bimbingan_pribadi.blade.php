<!DOCTYPE html>
<html>
<head>
    <title> Bimbingan Pribadi {{ $data->siswa->name }}</title>
</head>
<body>
    <h1 style="text-align: center">Bimbingan Pribadi {{ $data->siswa->name }}</h1>

    <p>Nama = {{ $data->siswa->name }}</p>

    <p>alasan pertemuan = {{ $data->alasan_pertemuan }}</p>

    <p>solusi = {{ $data->solusi_guru }}</p>

    <p>Kelas = {{ $data->kelas->name }}</p>
    

    <p>Nama Guru Bk = {{ $data->guru->name }}</p>

    <p>Nama Wali Kelas = {{ $data->walas->name }}</p>
</body>
</html>
