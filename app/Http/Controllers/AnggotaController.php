<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function anggota()
    {
    	$anggota = DB::table('anggota')->paginate(10);

    	return view('anggota',['anggota' => $anggota]);
    }

    public function tambah()
    {
 
        // memanggil view tambah
        return view('tambah_anggota');
 
    }
 
    // method untuk insert data ke table anggota
    public function store(Request $request)
    {
        // insert data ke table anggota
        DB::table('anggota')->insert([
            'anggota_nama' => $request->anggota,
            'anggota_alamat' => $request->alamat,
            'anggota_jk' => $request->jk,
            'anggota_telp' => $request->telp
        ]);
        // alihkan halaman ke halaman anggota
        return redirect('/anggota');
 
    }

    public function edit($id)
    {
        // mengambil data anggota berdasarkan id yang dipilih
        $anggota = DB::table('anggota')->where('anggota_id',$id)->get();
        // passing data anggota yang didapat ke view edit.blade.php
        return view('edit_anggota',['anggota' => $anggota]);
 
    }
 
    // update data anggota
    public function update(Request $request)
    {
        // update data anggota
        DB::table('anggota')->where('anggota_id',$request->id)->update([
            'anggota_nama' => $request->anggota,
            'anggota_alamat' => $request->alamat,
            'anggota_jk' => $request->jk,
            'anggota_telp' => $request->telp
        ]);
        // alihkan halaman ke halaman anggota
        return redirect('/anggota');
    }

    public function hapus($id)
	{
		DB::table('anggota')->where('anggota_id',$id)->delete();
		
		return redirect('/anggota');
	}
}


