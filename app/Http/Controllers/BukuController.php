<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kategori;
use App\Buku;

class BukuController extends Controller
{
    public function buku()
    {
  //   	$buku = DB::table('buku')
  //   	->join('kategori', 'buku.kategori_id', '=', 'kategori.kategori_id')
		// ->select('buku.buku_judul', 'kategori.kategori_nama', 'kategori.kategori_id','buku.buku_deskripsi', 'buku.buku_jumlah' ,'buku.buku_cover', 'buku.buku_id')
  //   	->get();
        $buku = Buku::with('kategori')->get();
        // dd($buku);

    	return view('buku',['buku' => $buku]);
    }

    public function tambah()
    {
 
        // $kategori = DB::table('kategori') //categories
        // ->select('*')
        // ->get();
        $kategori = Kategori::all();

        return view('tambah_buku',['kategori' => $kategori]);
    }
 
    // method untuk insert data ke table buku
    public function store(Request $request)
    {
        // insert data ke table buku
        DB::table('buku')->insert([
            'buku_judul' => $request->judul,
            'kategori_id' => $request->kategori,
            'buku_deskripsi' => $request->deskripsi,
            'buku_jumlah' => $request->jumlah,
            'buku_cover' => $request->cover
        ]);
        // alihkan halaman ke halaman buku
        return redirect('/buku');

    }

    public function edit($id)
    {
        // mengambil data buku berdasarkan id yang dipilih
        $buku = DB::table('buku')->where('buku_id',$id)->get();
        // passing data buku yang didapat ke view edit.blade.php
        $kategori = Kategori::all();
        // ambil data dari kategori
        return view('edit_buku',['buku' => $buku, 'kategori' => $kategori]);
 
    }
 
    // update data buku
    public function update(Request $request)
    {
        // update data buku
        DB::table('buku')->where('buku_id',$request->id)->update([
            'buku_judul' => $request->judul,
            'kategori_id' => $request->kategori,
            'buku_deskripsi' => $request->deskripsi,
            'buku_jumlah' => $request->jumlah,
            'buku_cover' => $request->cover
        ]);
        // alihkan halaman ke halaman buku
        return redirect('/buku');
    }

    public function hapus($id)
	{
		DB::table('buku')->where('buku_id',$id)->delete();
		
		return redirect('/buku');
	}
}
