<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function pengembalian()
    {
        $pengembalian = DB::table('pinjam')
        ->join('buku', 'buku.buku_id', '=', 'pinjam.buku_id')
        ->join('anggota', 'anggota.anggota_id', '=', 'pinjam.anggota_id')
        ->join('kembali' , 'pinjam.pinjam_id', '=', 'kembali.pinjam_id')
        ->select('buku.buku_judul', 'pinjam.tgl_pinjam', 'pinjam.tgl_jatuh_tempo' ,'kembali.kembali_id' ,'kembali.tgl_kembali' ,'anggota.anggota_nama')
        ->get();

        return view('list-pengembalian',['pengembalian' => $pengembalian]);
    }
    public function list_pengembalian(Request $request)
    {
        // insert data ke table anggota
        DB::table('kembali')->insert([
            'buku_id' => $request->judul,
            'anggota-id' => $request->nama, 
            'pinjam_id' => $request->pinjam,
            'tgl_jatuh_tempo' => $request->jt,
            'tgl_kembali' => $request->kembali,
            'denda' => $request->denda
        ]);
        // alihkan halaman ke halaman anggota
        return redirect('/list_pengembalian');
 
    }
}
