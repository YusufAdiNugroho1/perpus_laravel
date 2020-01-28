<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    <title>Tambah buku</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
    <h1>SI Perpustakaan</h1>

    <div id="sidebar">
        @include('includes.sidebar')
    </div>

    <div class="content">
        <h3>Tambah Data buku</h3>
        <form action="/buku/store" method="post">{{ csrf_field() }}
        <p>Judul</p><input type="text" name="judul"><br>
        <p>Kategori</p>
            <select name="kategori">
                @foreach ($kategori as $b) :
                     <option value="{{ $b->kategori_id }}">{{ $b->kategori_nama }}</option>
                @endforeach
            </select><br>
        <p>Deskripsi</p><input name="deskripsi"><br>
        <p>Jumlah</p><input type="text" name="jumlah"><br>
        <p>cover</p><input type="file" name="cover"></p>
        <br><br>
        <input type="submit" value="Simpan Data" class="btn btn-submit">
        <input type="reset" class="btn btn-submit" value="Batal">
        </form>
    </div>
</div>
</body>
</html>