<html>
<head>
    @include('includes.head')
    <title>Data Rak Buku</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
    <h1>SI Perpustakaan</h1>

    <div id="sidebar">
        @include('includes.sidebar')
    </div>

    <div class="content">
        <h1>Data Rak Buku</h1>
        <div class="btn-tambah-div">
            <a href="/rak_buku/tambah_rak_buku"><button class="btn btn-tambah">Tambah Data</button></a>
    </div>

    <table class="data">
        <tr>
            <th>Rak</th>
            <th>Buku</th>
            <th width="20%">Pilihan</th>
        </tr>
        @foreach($rak_buku as $r)
        <tr>
            <td>{{ $r->rak_nama }}</td>
            <td>{{ $r->buku_judul }}</td>
            <td>
                <a href="/rak_buku/edit_rak_buku/{{ $r->id }}" class="btn btn-edit">Edit</a>
                <a href="/rak_buku/hapus/{{ $r->id }}" class="btn btn-hapus">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    {{ $rak_buku->links() }}
</div>
</body>
</html>