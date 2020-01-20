<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Tambah Rak</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Tambah Data Rak</h3>
		<form action="/rak/store" method="post">{{ csrf_field() }}
		<p>Nama Rak </p>
			<input type="text" name="rak"><br>
		<p>Buku Judul </p>
			<input type="text" name="buku"><br>
		<input type="submit" value="Simpan Data" class="btn btn-submit">
		<input type="reset" class="btn btn-submit" value="Batal">
		</form>
	</div>
</div>
</body>
</html>