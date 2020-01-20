<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Edit Letak Buku</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Edit Letak Buku</h3>
		@foreach($rak_buku as $rb)
		<form action="/rak_buku/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $rb->id }}"> <br/>

		<p>Nama Rak </p>
			<p><select name="nama">
                @foreach ($rak as $r) :
                     <option value="{{ $r->rak_id }}">{{ $r->rak_nama }}</option>
                @endforeach
            </select></p>

         <p>Buku Judul </p>
         	<p><select name="buku">
                @foreach ($buku as $b) :
                     <option value="{{ $b->buku_id }}">{{ $b->buku_judul }}</option>
                @endforeach
            </select></p>
            
		<input type="submit" value="Simpan Data" class="btn btn-submit">
	</form>
	@endforeach
	</div>
</div>
</body>
</html>