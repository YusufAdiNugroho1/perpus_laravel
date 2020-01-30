<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    <title>Form Peminjaman</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}"></head>
<body>
    <div class="container clearfix">
        <h1>SI Perpustakaan</h1>

        <div id="sidebar">
            @include('includes.sidebar')
        </div>

        <div class="content">
            <h3>Transaksi Pengembalian Buku</h3>
            <form action="/list_pengembalian/store" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="pinjam_id" value="{{ $kembali->pinjam_id }}">
            <input type="hidden" name="jt" value="{{ $kembali->tgl_jatuh_tempo }}">
            <input type="hidden" name="kembali" value="{{date('Y-m-d')}}">
            <input type="hidden" name="denda" value="{{ $denda }}" >

            <p>Judul</p>
                    <p><input type="text" name="judul" value="{{ $buku->buku_judul }}" disabled ></p>
            <p>Anggota</p>
                <p><input type="text" name="nama" value="{{ $anggota->anggota_nama }}" disabled ></p>
            <p>Tanggal Pinjam</p>
                <p><input type="date" name="pinjam" value="{{ $kembali->tgl_pinjam }}" disabled></p>
            <p>Tanggal Jatuh Tempo</p>
                <p><input type="date" name="jt" value="{{ $kembali->tgl_jatuh_tempo }}" disabled ></p>
            <p>Tanggal Kembali</p>
                <p><input type="date" name="kembali" value="{{date('Y-m-d')}}" disabled ></p>
            <p>Denda</p>
                <p><input type="text" name="denda" value="{{ $denda }}" disabled ></p>

            <input type="submit" value="Simpan Data" class="btn btn-submit">
            </form>
        </div>

    </div>
</body>
</html>

