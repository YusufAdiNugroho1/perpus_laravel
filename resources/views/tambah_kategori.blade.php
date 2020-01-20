<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Tambah kategori</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Tambah Data Kategori</h3>
		<form action="/kategori/store" method="post">{{ csrf_field() }}
		kategori <input type="text" name="kategori"><br><br>
		<input type="submit" value="Simpan Data" class="btn btn-submit">
		<input type="reset" class="btn btn-submit" value="Batal">
		</form>
	</div>
</div>
</body>
</html>