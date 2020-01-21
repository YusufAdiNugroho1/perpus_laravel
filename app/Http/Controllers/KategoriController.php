<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kategori;

class KategoriController extends Controller
{
    public function kategori()
    {
    	$kategori = DB::table('kategori')->paginate(10);

    	return view('kategori',['kategori' => $kategori]);
    }

    public function tambah()
	{
 
		// memanggil view tambah
		return view('tambah_kategori');
 
	}
 
	// method untuk insert data ke table kategori
	public function store(Request $request)
	{
		// insert data ke table kategori
		// DB::table('kategori')->insert([
		// 	'kategori_nama' => $request->kategori,
		// ]);

		// $kategori = new Kategori();
		// $kategori->kategori_nama = $request->kategori;

		// if($kategori->save()){
		// 	return redirect('/kategori');	
		// }else{
		// 	return "Gagal menyimpan";
		// }

		$kategori = Kategori::create([
			"kategori_nama" => $request->kategori,
		]);

		if($kategori){
			return redirect('/kategori');	
		}else{
			return "Gagal menyimpan";
		}

		// alihkan halaman ke halaman kategori
		
 
	}

	public function edit($id)
	{
		// mengambil data kategori berdasarkan id yang dipilih
		$kategori = DB::table('kategori')->where('kategori_id',$id)->get();
		// passing data kategori yang didapat ke view edit.blade.php
		return view('edit_kategori',['kategori' => $kategori]);
 
	}
 
	// update data kategori
	public function update(Request $request)
	{
		// update data kategori
		DB::table('kategori')->where('kategori_id',$request->id)->update([
			'kategori_nama' => $request->kategori_nama,
		]);
		// alihkan halaman ke halaman kategori
		return redirect('/kategori');
	}

    public function hapus($id)
	{
		DB::table('kategori')->where('kategori_id',$id)->delete();
		
		return redirect('/kategori');
	}
}
