<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Tambah anggota</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Tambah Data anggota</h3>
		<form action="/anggota/store" method="post">{{ csrf_field() }}
		<p>Anggota</p>
			<p><input type="text" name="anggota"></p>
		<p>Alamat</p>
			<p><input type="text" name="alamat"></p>
		<p>Jenis Kelamin</p>
        <p>
            <select name="jk">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </p>
        <p>Telepon<p>
        	<p><input type="text" name="telp"></p>
		<input type="submit" value="Simpan Data" class="btn btn-submit">
		<input type="reset" class="btn btn-submit" value="Batal">
		</form>
	</div>
</div>
</body>
</html>