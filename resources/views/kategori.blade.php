<html>
<head>
    @include('includes.head')
    <title>Data Kategori</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
    <h1>SI Perpustakaan</h1>

    <div id="sidebar">
        @include('includes.sidebar')
    </div>

    <div class="content">
        <h1>Data Kategori</h1>
        <div class="btn-tambah-div">
            <a href="/kategori/tambah_kategori"><button class="btn btn-tambah">Tambah Data</button></a>
    </div>

    <table class="data">
        <tr>
            <th>Kategori</th>
            <th width="20%">Pilihan</th>
        </tr>
        @foreach($kategori as $b)
        <tr>
            <td>{{ $b->kategori_nama }}</td>
            <td>
                <a href="/kategori/edit_kategori/{{ $b->kategori_id }}" class="btn btn-edit">Edit</a>
                <a href="/kategori/hapus/{{ $b->kategori_id }}" class="btn btn-hapus">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>