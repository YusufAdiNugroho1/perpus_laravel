<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Edit Rak</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Edit Rak</h3>
		@foreach($rak as $p)
		<form action="/rak/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->rak_id }}"> <br/>
		Nama Rak <input type="text" required="required" name="rak_nama" value="{{ $p->rak_nama }}"> <br/><br>
		<input type="submit" value="Simpan Data" class="btn btn-submit">
	</form>
	@endforeach
	</div>
</div>
</body>
</html>