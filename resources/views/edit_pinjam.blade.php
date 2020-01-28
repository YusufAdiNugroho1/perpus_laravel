<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>Edit Pinjam</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
</head>
<body>
<div class="container clearfix">
	<h1>SI Perpustakaan</h1>

	<div id="sidebar">
		@include('includes.sidebar')
	</div>

	<div class="content">
		<h3>Edit Pinjam</h3>
		<form action="/pinjam/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="pinjam_id" value="{{ $pinjam->pinjam_id }}">
		
		<p>Buku Judul </p>
         	<p><select name="judul">
                @foreach ($buku as $b) :

                @if ($b->buku_id == $pinjam->buku_id)
                    <option selected value="{{ $b->buku_id }}">{{ $b->buku_judul }}</option>
                @else
                	<option value="{{ $b->buku_id }}">{{ $b->buku_judul }}</option>
                @endif
                
                @endforeach
            </select></p>

        <p>Nama Anggota </p>
         	<p><select name="nama">
                @foreach ($anggota as $a) :

                @if ($a->anggota_id == $pinjam->anggota_id)
                    <option selected value="{{ $a->anggota_id }}">{{ $a->anggota_nama }}</option>
                @else
                	<option value="{{ $a->anggota_id }}">{{ $a->anggota_nama }}</option>
                @endif
                
                @endforeach
            </select></p>

        <p>Tanggal Pinjam</p>
            <p><input type="date" name="pinjam" required="required" value="{{ $pinjam->tgl_pinjam }}" ></p>

        <p>Tanggal Jatuh Tempo</p>
            <p><input type="date" name="jt" required="required" value="{{ $pinjam->tgl_jatuh_tempo }}" ></p>

		<input type="submit" value="Simpan Data" class="btn btn-submit">
	</form>
	</div>
</div>
</body>
</html>