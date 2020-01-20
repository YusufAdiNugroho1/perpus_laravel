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
            @foreach($kembali as $kem)
            <form action="/list-pengembalian" method="post">{{ csrf_field() }}
            <input type="hidden" name="pinjam_id" value="{{ $kem->pinjam_id }}">
            <input type="hidden" name="tgl_kembali" value="{{ $kem->tgl_kembali }}">

            <p>Judul</p>
                <p><input type="text" name="judul" value="{{ $kem->buku_judul }}" disabled></p>
            <p>Anggota</p>
                <p><input type="text" name="nama" value="{{ $kem->anggota_nama}}" disabled></p>
            <p>Tanggal Pinjam</p>
                <p><input type="date" name="pinjam" value="{{ $kem->tgl_pinjam }}" disabled></p>
            <p>Tanggal Jatuh Tempo</p>
                <p><input type="date" name="jt" value="{{ $kem->tgl_jatuh_tempo }}" disabled></p>
            <p>Tanggal Kembali</p>
                <p><input type="date" name="kembali" value="{{ $kem->tgl_kembali }}" disabled></p>
            <p>Denda</p>
                <p><input type="text" name="denda" value="" disabled></p>
            <input type="submit" value="Simpan Data" class="btn btn-submit">
            @endforeach
            </form>
        </div>

    </div>
</body>
</html>

