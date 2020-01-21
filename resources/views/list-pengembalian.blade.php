<html>
<head>
    @include('includes.head')
    <title>Data Pengembalian</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
    <h1>SI Perpustakaan</h1>

    <div id="sidebar">
        @include('includes.sidebar')
    </div>

    <div class="content">
        <h1>Data Pengembalian</h1>
    <table class="data">
        <tr>
            <th>Buku</th>
            <th>Nama</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Jatuh Tempo</th>
            <th>Tgl Kembali</th>
            <th width="20%">Pilihan</th>
        </tr>
        @foreach($pengembalian as $b)
        <tr>
            <td>{{ $b->buku_judul }}</td>
            <td>{{ $b->anggota_nama }}</td>
            <td>{{ $b->tgl_pinjam }}</td>
            <td>{{ $b->tgl_jatuh_tempo }}</td>
            <td>{{ $b->tgl_kembali }}</td>
            <td>
                <a href="/pengembalian/hapus/{{ $b->kembali_id }}" class="btn btn-hapus">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    {{ $pengembalian->links() }}
</div>
</body>
</html>