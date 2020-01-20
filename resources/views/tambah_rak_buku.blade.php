<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Tambah Letak Buku</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Tambah Letak Buku</h3>
		<form action="/rak_buku/store" method="post">{{ csrf_field() }}
		<p>Nama Rak </p>
			<p><select name="nama">
                @foreach ($rak as $b) : 
                     <option value="{{ $b->rak_id }}">{{ $b->rak_nama }}</option>
                @endforeach
            </select></p>
		<p>Buku Judul</p>
			<p><select name="judul">
                @foreach ($buku as $bk) : 
                     <option value="{{ $bk->buku_id }}">{{ $bk->buku_judul }}</option>
                @endforeach
            </select></p>
		<input type="submit" value="Simpan Data" class="btn btn-submit">
		<input type="reset" class="btn btn-submit" value="Batal">
		</form>
	</div>
</div>
</body>
</html>