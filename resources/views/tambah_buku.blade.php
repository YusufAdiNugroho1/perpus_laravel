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
        <p>Judul</p>

            <p><input type="text" name="judul"></p>

        <p>Kategori</p>

            <p><select name="kategori">
                @foreach ($kategori as $b) :
                     <option value="{{ $b->kategori_id }}">{{ $b->kategori_nama }}</option>
                @endforeach
            </select></p>

        <p>Deskripsi</p>

            <p><input name="deskripsi"></p>

        <p>Jumlah</p>

            <p><input type="text" name="jumlah"></p>

        <p>cover</p>

            <p><input type="file" name="cover"></p>

        <input type="submit" value="Simpan Data" class="btn btn-submit">
        <input type="reset" class="btn btn-submit" value="Batal">
        </form>
    </div>
</div>
</body>
</html>