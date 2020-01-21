<html>
<head>
    @include('includes.head')
    <title>Data Pinjam</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
    <h1>SI Perpustakaan</h1>

    <div id="sidebar">
        @include('includes.sidebar')
    </div>

    <div class="content">
        <h1>Data Pinjam</h1>
        <div class="btn-tambah-div"><a href="/pinjam/tambah_pinjam"><button class="btn btn-tambah">Tambah</button></a>
    </div>
    <table class="data">
        <tr>
            <th>Buku</th>
            <th>Nama</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Jatuh Tempo</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
            <th width="20%">Pilihan</th>
        </tr>
        @foreach($pinjam as $p)
        <tr>
            <td>{{ $p->buku_judul }}</td>
            <td>{{ $p->anggota_nama }}</td>
            <td>{{ $p->tgl_pinjam }}</td>
            <td>{{ $p->tgl_jatuh_tempo }}</td>
            <td>@if (empty($p->tgl_kembali))
                    -
                @else
                    {{ $p->tgl_kembali }}
                @endif</td>
            <td>  
                @if (empty($p->tgl_kembali))
                    Pinjam
                @else
                    Kembali
                @endif </td>
            <td width="30%">
                @if (empty($p->tgl_kembali))
                    <a href="/pinjam/kembali/{{ $p->pinjam_id }}" class="btn btn-tambah">Kembali</a>
                    <a href="/pinjam/edit_pinjam/{{ $p->pinjam_id }}" class="btn btn-edit">Edit</a>
                @endif
                <a href="/pinjam/hapus/{{ $p->pinjam_id }}" class="btn btn-hapus">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>