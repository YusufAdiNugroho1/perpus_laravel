<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rak;
use App\Buku;
use App\RakBuku;

class RakBukuController extends Controller
{
    public function index()
    {
        $rak_buku = DB::table('rak_buku')
        ->join('buku', 'buku.buku_id', '=', 'rak_buku.buku_id')
        ->join('rak', 'rak_buku.rak_id', '=', 'rak.rak_id')
        ->select('rak.rak_nama', 'buku.buku_judul', 'buku.buku_jumlah', 'buku.buku_cover', 'rak_buku.id')
        ->get();

        return view('rak_buku',['rak_buku' => $rak_buku]);
    }

    public function rak_buku()
    {
    	$rak_buku = DB::table('rak_buku')
    	->join('buku', 'buku.buku_id', '=', 'rak_buku.buku_id')
    	->join('rak', 'rak_buku.rak_id', '=', 'rak.rak_id')
    	->select('rak.rak_nama', 'buku.buku_judul', 'buku.buku_jumlah', 'buku.buku_cover', 'rak_buku.id')
    	->get();

    	return view('rak_buku',['rak_buku' => $rak_buku]);
    }

    public function tambah()
    {
 
        $rak = Rak::all();
        $buku = Buku::all();

        return view('tambah_rak_buku',['rak' => $rak, 'buku' => $buku]);
 
    }
 
    // method untuk insert data ke table kategori
    public function store(Request $request)
    {
        // insert data ke table kategori
        DB::table('rak_buku')->insert([
            'rak_id' => $request->nama,
            'buku_id' => $request->judul
        ]);
        // alihkan halaman ke halaman kategori
        return redirect('/rak_buku');
 
    }

    public function hapus($id)
	{
		DB::table('rak_buku')->where('id',$id)->delete();
		
		return redirect('/rak_buku');
	}

    public function edit($id)
    {
        // mengambil data rak berdasarkan id yang dipilih
        $rak_buku = DB::table('rak_buku')->where('id',$id)->get();
        $rak = Rak::all();
        $buku = Buku::all();
        // passing data rak yang didapat ke view edit.blade.php
        return view('edit_rak_buku',['rak_buku' => $rak_buku, 'rak' => $rak, 'buku' => $buku]);
 
    }
 
    // update data rak
    public function update(Request $request)
    {
        // update data rak
        DB::table('rak_buku')->where('id',$request->id)->update([
            'rak_nama' => $request->nama,
            'buku_judul' => $request->judul
        ]);
        // alihkan halaman ke halaman rak
        return redirect('/rak_buku');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
 
            // mengambil data dari table pegawai sesuai pencarian data
        $rak_buku = DB::table('rak_buku')
        ->join('buku', 'buku.buku_id', '=', 'rak_buku.buku_id')
        ->join('rak', 'rak_buku.rak_id', '=', 'rak.rak_id')
        ->select('rak.rak_nama', 'buku.buku_judul', 'buku.buku_jumlah', 'buku.buku_cover', 'rak_buku.id')
        ->where('buku_judul','like',"%".$cari."%")
        ->paginate();
 
            // mengirim data pegawai ke view index
        return view('index',['rak_buku' => $rak_buku]);
 
    }
}
