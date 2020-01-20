<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Edit kategori</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Edit Kategori</h3>
		@foreach($kategori as $p)
		<form action="/kategori/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->kategori_id }}"> <br/>
		Nama <input type="text" required="required" name="kategori_nama" value="{{ $p->kategori_nama }}"> <br/><br>
		<input type="submit" value="Simpan Data" class="btn btn-submit">
	</form>
	@endforeach
	</div>
</div>
</body>
</html>