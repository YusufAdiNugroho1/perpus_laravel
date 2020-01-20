<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    <title>Tambah Pinjam</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
    <h1>SI Perpustakaan</h1>

    <div id="sidebar">
        @include('includes.sidebar')
    </div>

    <div class="content">
        <h3>Tambah Data Pinjam</h3>
        <form action="/pinjam/store" method="post">{{ csrf_field() }}
        <p>Buku Judul</p>
            <p><select name="judul">
                @foreach ($buku as $bk) : 
                     <option value="{{ $bk->buku_id }}">{{ $bk->buku_judul }}</option>
                @endforeach
            </select></p>

        <p>Kategori</p>
            <select name="nama">
                @foreach ($anggota as $an) :
                     <option value="{{ $an->anggota_id }}">{{ $an->anggota_nama }}</option>
                @endforeach
            </select>

        <p>Tanggal Pinjam</p>
            <p><input type="date" name="tgl_pinjam"><p>

        <p>Tanggal Jatuh Tempo</p>
            <p><input type="date" name="tgl_jatuh_tempo"><p>

        <input type="submit" value="Simpan Data" class="btn btn-submit">
        <input type="reset" class="btn btn-submit" value="Batal">
        </form>
    </div>
</div>
</body>
</html>