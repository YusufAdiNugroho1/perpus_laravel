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
		<form action="/rak_buku/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $rak_buku->id }}"> <br/>

		<p>Nama Rak </p>
			<p><select name="nama">
                @foreach ($rak as $r) :

                @if ($r->rak_id == $rak_buku->rak_id)
                    <option selected value="{{ $r->rak_id }}">{{ $r->rak_nama }}</option>
                @else
                	<option value="{{ $r->rak_id }}">{{ $r->rak_nama }}</option>
                @endif

                @endforeach
            </select></p>

         <p>Buku Judul </p>
         	<p><select name="judul">
                @foreach ($buku as $b) :

                @if ($b->buku_id == $rak_buku->buku_id)
                    <option selected value="{{ $b->buku_id }}">{{ $b->buku_judul }}</option>
                @else
                	<option value="{{ $b->buku_id }}">{{ $b->buku_judul }}</option>
                @endif
                
                @endforeach
            </select></p>
            
		<input type="submit" value="Simpan Data" class="btn btn-submit">
	</form>
	</div>
</div>
</body>
</html>