<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RakController extends Controller
{
    public function rak()
    {
    	$rak = DB::table('rak')->paginate(10);

    	return view('rak',['rak' => $rak]);
    }

    public function tambah()
	{
 
		// memanggil view tambah
		return view('tambah_rak');
 
	}
 
	// method untuk insert data ke table rak
	public function store(Request $request)
	{
		// insert data ke table rak
		DB::table('rak')->insert([
			'rak_nama' => $request->rak
		]);
		// alihkan halaman ke halaman rak
		return redirect('/rak');
 
	}

	public function edit($id)
	{
		// mengambil data rak berdasarkan id yang dipilih
		$rak = DB::table('rak')->where('rak_id',$id)->get();
		// passing data rak yang didapat ke view edit.blade.php
		return view('edit_rak',['rak' => $rak]);
 
	}
 
	// update data rak
	public function update(Request $request)
	{
		// update data rak
		DB::table('rak')->where('rak_id',$request->id)->update([
			'rak_nama' => $request->rak_nama,
		]);
		// alihkan halaman ke halaman rak
		return redirect('/rak');
	}

    public function hapus($id)
	{
		DB::table('rak')->where('rak_id',$id)->delete();
		
		return redirect('/rak');
	}
}
