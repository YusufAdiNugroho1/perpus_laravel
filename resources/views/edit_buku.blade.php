<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Edit buku</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Edit buku</h3>
		@foreach($buku as $p)
		<form action="/buku/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="buku_id" value="{{ $p->buku_id }}">
		
		<p>Buku Judul </p>
		<p><input type="text" required="required" name="judul" value="{{ $p->buku_judul }}"> </p>

		<p>Kategori</p>
			<select name="kategori">
                @foreach ($kategori as $category) :
                     <option value="{{ $category->kategori_id }}">{{ $category->kategori_nama }}</option>
                @endforeach
            </select>

		<p>Deskripsi</p>
        <p><textarea required="required" name="deskripsi">{{ $p->buku_deskripsi }}</textarea></p>

        <p>Jumlah</p>
        <p><input type="number" required="required" name="jumlah" value="{{ $p->buku_jumlah }}"></p>

        <p>Cover</p>
        <p><input type="file" required="required" name="cover"></p>

		<input type="submit" value="Simpan Data" class="btn btn-submit">
	</form>
	@endforeach
	</div>
</div>
</body>
</html>