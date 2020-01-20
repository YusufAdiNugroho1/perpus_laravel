<html>
<head>
    @include('includes.head')
    <title>Data Buku</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
    <h1>SI Perpustakaan</h1>

    <div id="sidebar">
            @include('includes.sidebar')
    </div>

    <div class="content">
        <h1>Daftar Buku</h1>
        <div class="btn-tambah-div">
            <a href="/buku/tambah_buku"><button class="btn btn-tambah">Tambah Data</button></a>
    </div>

    <table class="data">
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Jumlah</th>
            <th>Cover</th>
            <th width="20%">Pilihan</th>
        </tr>
        @foreach($buku as $b)
        <tr>
            <td>{{ $b->buku_judul }}</td>
            <td>{{ $b->kategori->kategori_nama }}</td>
            <td>{{ $b->buku_deskripsi }}</td>
            <td>{{ $b->buku_jumlah }}</td>
            <td width="20%"><img width="70%" class="buku-cover" src="{{URL::asset('image/ $b->buku_cover ') }}"></td>
            <td>
                <a href="/buku/edit_buku/{{ $b->buku_id }}" class="btn btn-edit">Edit</a>
                <a href="/buku/hapus/{{ $b->buku_id }}" class="btn btn-hapus">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>