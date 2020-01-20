<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $rak_buku = DB::table('rak_buku')
        ->join('buku', 'buku.buku_id', '=', 'rak_buku.buku_id')
        ->join('rak', 'rak_buku.rak_id', '=', 'rak.rak_id')
        ->select('rak.rak_nama', 'buku.buku_judul', 'buku.buku_jumlah', 'buku.buku_cover', 'rak_buku.id')
        ->get();

        return view('index',['rak_buku' => $rak_buku]);
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
