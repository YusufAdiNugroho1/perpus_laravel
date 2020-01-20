<!DOCTYPE html>
<html>
<head>
	<title>Siperpus</title>
	<link href="{{ asset('css/ss.css') }}" rel="stylesheet" />
</head>
<body>
	<div class="navbar">
        <a href="login">Login</i></a>
    </div>
   <center> 
	<h1 style="margin-top: 120px;">My Perpus</h1>
	<form action="/rak_buku/cari" method="GET">
		<input type="text" name="cari" class="search" placeholder="Cari buku .." value="{{ old('cari') }}">
		<input type="submit" value="CARI" class="submit">
	</form>
		
	<br/>
 
	<table class="data">
		<tr>
			<th>Judul Buku</th>
            <th>Cover</th>
            <th>Rak</th>
            <th>Stok</th>
		</tr>
		@foreach($rak_buku as $rb)
		<tr>
			<td>{{ $rb->buku_judul }}</td>
			<td>{{ $rb->buku_cover }}</td>
			<td>{{ $rb->rak_nama }}</td>
			<td>{{ $rb->buku_jumlah }}</td>
		</tr>
		@endforeach
	</table>
	</center>
 
</body>
</html>