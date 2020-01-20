<html>
<head>
    @include('includes.head')
    <title>Data Rak</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
    <h1>SI Perpustakaan</h1>

    <div id="sidebar">
        @include('includes.sidebar')
    </div>

    <div class="content">
        <h1>Data Rak</h1>
        <div class="btn-tambah-div">
            <a href="/rak/tambah_rak"><button class="btn btn-tambah">Tambah Data</button></a>
    </div>

    <table class="data">
        <tr>
            <th>rak</th>
            <th width="20%">Pilihan</th>
        </tr>
        @foreach($rak as $r)
        <tr>
            <td>{{ $r->rak_nama }}</td>
            <td>
                <a href="/rak/edit_rak/{{ $r->rak_id }}" class="btn btn-edit">Edit</a>
                <a href="/rak/hapus/{{ $r->rak_id }}" class="btn btn-hapus">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>