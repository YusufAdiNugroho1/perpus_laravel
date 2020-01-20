<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Edit Rak</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Edit Rak</h3>
		@foreach($pinjam as $p)
		<form action="/pinjam/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->pinjam_id }}"> <br/>
		<p>Judul</p>
                <p><input type="text" name="judul" value="{{ $p->buku_judul }}" disabled></p>
            <p>Anggota</p>
                <p><input type="text" name="nama" value="{{ $p->anggota_nama}}" disabled></p>
            <p>Tanggal Pinjam</p>
                <p><input type="date" name="pinjam" value="{{ $p->tgl_pinjam }}" disabled></p>
            <p>Tanggal Jatuh Tempo</p>
                <p><input type="date" name="jt" value="{{ $p->tgl_jatuh_tempo }}" disabled></p>
            <p>Tanggal pbali</p>
                <p><input type="date" name="pbali" value="{{ $p->tgl_kembali }}" disabled></p>
            <p>Denda</p>
                <p><input type="text" name="denda" value="" disabled></p>
		<input type="submit" value="Simpan Data" class="btn btn-submit">
	</form>
	@endforeach
	</div>
</div>
</body>
</html>