<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Edit Pinjam</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Edit Pinjam</h3>
		@foreach($pinjam as $p)
		<form action="/pinjam/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="pinjam_id" value="{{ $p->pinjam_id }}">
		
		<p>Judul</p>
            <p><input type="text" name="judul" required="required" value="{{ $p->buku_judul }}" ></p>
        <p>Anggota</p>
            <p><input type="text" name="nama" required="required" value="{{ $p->anggota_nama}}" ></p>
        <p>Tanggal Pinjam</p>
            <p><input type="date" name="pinjam" required="required" value="{{ $p->tgl_pinjam }}" ></p>
        <p>Tanggal Jatuh Tempo</p>
            <p><input type="date" name="jt" required="required" value="{{ $p->tgl_jatuh_tempo }}" ></p>

		<input type="submit" value="Simpan Data" class="btn btn-submit">
	</form>
	@endforeach
	</div>
</div>
</body>
</html>