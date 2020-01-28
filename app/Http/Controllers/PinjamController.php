<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Buku;
use App\Anggota;    

class PinjamController extends Controller
{
    public function pinjam()
    {   
    	$pinjam = DB::select("
            SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, anggota.anggota_nama,
            (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
            FROM pinjam
            JOIN buku ON buku.buku_id = pinjam.buku_id
            JOIN anggota ON anggota.anggota_id = pinjam.anggota_id
        ");

    	return view('pinjam', ['pinjam' => $pinjam]);
    }

    public function kembali($id)
    {
        $kembali = DB::table('pinjam')->where('pinjam_id',$id)->first();
        $buku = Buku::find($kembali->buku_id);
        $anggota = Anggota::find($kembali->anggota_id);

        return view('kembali',['kembali' => $kembali, 'buku' => $buku, 'anggota' => $anggota]);
    }

    public function list_pengembalian(Request $request)
    {
        // insert data ke table anggota
        DB::table('kembali')->insert([
            'pinjam_id' => $request->pinjam,
            'tgl_kembali' => $request->kembali,
            'denda' => $request->denda
        ]);
        // alihkan halaman ke halaman anggota
        return redirect('/list_pengembalian');
 
    }

    public function tambah()
    {
 
        // $kategori = DB::table('kategori') //categories
        // ->select('*')
        // ->get();\
        $buku = Buku::all();
        $anggota = Anggota::all();

        return view('tambah_pinjam',['buku' => $buku, 'anggota' => $anggota]);
    }
 
    // method untuk insert data ke table buku
    public function store(Request $request)
    {
        // insert data ke table buku
        DB::table('pinjam')->insert([
            'buku_id' => $request->judul,
            'anggota_id' => $request->nama,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_jatuh_tempo' => $request->tgl_jatuh_tempo
        ]);
        // alihkan halaman ke halaman buku
        return redirect('/pinjam');

    }

    function hitung_denda($tgl_kembali, $tgl_jatuh_tempo)
    {
        if (strtotime( $tgl_kembali ) > strtotime($tgl_jatuh_tempo)) {
            $kembali = new DateTime($tgl_kembali);
            $jatuh_tempo = new DateTime($tgl_jatuh_tempo);

            $selisih = $kembali->diff($jatuh_tempo);
            $selisih = $selisih->format('%d');

            $denda = 2000 * $selisih;
        } else {
            $denda = 0;
        }

        return view('kembali',['kembali' => $denda]);
    
    }
    function kurangi_stok($db, $buku_id)
    {
        $q = "UPDATE buku SET buku_jumlah = buku_jumlah - 1 WHERE buku_id = $buku_id";
        mysqli_query($db, $q);
    }
    function tambah_stok($db, $buku_id)
    {
        $q = "UPDATE buku SET buku_jumlah = buku_jumlah + 1 WHERE buku_id = $buku_id";
        mysqli_query($db, $q);
    }

    public function hapus($id)
    {
        DB::table('pinjam')->where('pinjam_id',$id)->delete();
        
        return redirect('/pinjam');
    }

    public function edit($id)
    {
        // mengambil data rak berdasarkan id yang dipilih
        $pinjam = DB::table('pinjam')->where('pinjam_id',$id)->first();
        $buku = Buku::all();
        $anggota = Anggota::all();

        // passing data rak yang didapat ke view edit.blade.php
        return view('edit_pinjam',['pinjam' => $pinjam, 'buku' => $buku, 'anggota' => $anggota]);
 
    }
 
    // update data rak
    public function update(Request $request)
    {
        // update data rak
        DB::table('pinjam')->where('pinjam_id',$request->pinjam_id)->update([
            'buku_id' => $request->judul,
            'anggota_id' => $request->nama,
            'tgl_pinjam' => $request->pinjam,
            'tgl_jatuh_tempo' => $request->jt
        ]);
        // alihkan halaman ke halaman rak
        return redirect('/pinjam');
    }
}
