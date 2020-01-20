<html>
<head>
    @include('includes.head')
    <title>Data Anggota</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
    <h1>SI Perpustakaan</h1>

    <div id="sidebar">
            @include('includes.sidebar')
    </div>

    <div class="content">
        <h1>Data Anggota</h1>
        <div class="btn-tambah-div">
            <a href="/anggota/tambah_anggota"><button class="btn btn-tambah">Tambah Data</button></a>
    </div>
    <table class="data">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>JK</th>
            <th>No Telepon</th>
            <th width="20%">Pilihan</th>
        </tr>
        @foreach($anggota as $a)
        <tr>
            <td>{{ $a->anggota_nama }}</td>
            <td>{{ $a->anggota_alamat }}</td>
            <td>{{ $a->anggota_jk }}</td>
            <td>{{ $a->anggota_telp }}</td>
            <td>
                <a href="/anggota/edit_anggota/{{ $a->anggota_id }}" class="btn btn-edit">Edit</a>
                <a href="/anggota/hapus/{{ $a->anggota_id }}" class="btn btn-hapus">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>