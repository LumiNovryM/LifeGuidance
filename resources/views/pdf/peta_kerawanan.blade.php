<!DOCTYPE html>
<html>
<head>
    <title> Peta Kerawanan {{ $data->siswa->name }}</title>
</head>
<body>
    <img src="assets/img/kop TB.jpg" width="100%" alt="">
    <p>Kepada Yth.,</p>
    <p style="width: 200px">Bapak/Ibu Murid Bersangkutan
        SMK Taruna Bhakti
        Kota Depok, Provinsi Jawa Barat
    </p>
    <p>Dengan hormat,</p>
    <p style="width: 900px">Dalam rangka meningkatkan pemahaman dan kesadaran akan potensi kerawanan siswa di lingkungan sekolah, kami dengan ini mengirimkan surat resmi beserta peta kerawanan siswa yang telah disusun oleh tim kami.</p>
    <p style="width: 900px">Surat ini bertujuan untuk memberikan gambaran yang komprehensif mengenai faktor-faktor yang dapat mempengaruhi kesejahteraan dan keamanan siswa di sekitar lingkungan sekolah. Peta kerawanan siswa ini dirancang dengan tujuan untuk memvisualisasikan daerah-daerah yang mungkin berpotensi menghadirkan risiko dan bahaya bagi siswa.</p>


    <table>
        <tr>
            <td style="visibility: hidden">8=================D</td>
            <td style="visibility: hidden">8=================D</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: {{ $data->siswa->name }}</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>: {{ $data->kelas->name }}</td>
        </tr>

        <tr>
            <td>Nama Guru BK</td>
            <td>: {{ $data->guru->name }}</td>
        </tr>
        <tr>
            <td>Nama Wali Kelas</td>
            <td>: {{ $data->walas->name }}</td>
        </tr>
        <tr>
            <td>Kesimpulan</td>
            <td>: {{ $data->kesimpulan }}</td>
        </tr>
    </table>
 
<br>
<br>
<br>

    <table style="width: 100% " border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr >
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td style="text-align: center">1</td>
                <td>Sering Sakit</td>
                <td>{{ $data->sering_sakit == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td style="text-align: center">2</td>
                <td>Sering Izin</td>
                <td>{{ $data->sering_izin == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td style="text-align: center">3</td>
                <td>Sering Alpha</td>
                <td>{{ $data->sering_alpha == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td style="text-align: center">4</td>
                <td>Sering Terlambat</td>
                <td>{{ $data->sering_terlambat == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td style="text-align: center">5</td>
                <td>Bolos</td>
                <td>{{ $data->bolos == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td style="text-align: center">6</td>
                <td>Kelainan Jasmani</td>
                <td>{{ $data->kelainan_jasmani == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td style="text-align: center">7</td>
                <td>Minat Belajar Kurang</td>
                <td>{{ $data->minat_belajar_kurang == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td style="text-align: center">8</td>
                <td>Introvert</td>
                <td>{{ $data->introvert == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td style="text-align: center">9</td>
                <td>Tinggal Dengan Wali</td>
                <td>{{ $data->tinggal_dengan_wali == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
            <tr>
                <td style="text-align: center">10</td>
                <td>Kemampuan Kurang</td>
                <td>{{ $data->kemampuan_kurang == 0 ? 'Tidak' : 'Iya' }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
