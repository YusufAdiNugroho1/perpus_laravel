<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Edit Anggota</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Edit Anggota</h3>
		@foreach($anggota as $p)
		<form action="/anggota/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->anggota_id }}"> <br/>
		<p>Nama</p> 
			<p><input type="text" required="required" name="anggota" value="{{ $p->anggota_nama }}"> </p>
		<p>Alamat</p> 
			<p><input type="text" required="required" name="alamat" value="{{ $p->anggota_alamat }}"></p>
		<p>Jenis Kelamin</p>
            <p><select name="jk">
                 @if (count('anggota_jk') == "L") : 
                 <option value="L" selected>Laki-laki</option>
                 <option value="P">Perempuan</option>
                 @else : 
                 <option value="L">Laki-laki</option>
                 <option value="P" selected>Perempuan</option>
                 @endif
            </select></p>
        <p>Telepon</p>
        	<p><input type="text" name="telp" value="{{ $p->anggota_telp }}"></p>
		<input type="submit" value="Simpan Data" class="btn btn-submit">
	</form>
	@endforeach
	</div>
</div>
</body>
</html>