<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Buku;
use App\Anggota; 
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function pengembalian()
    {
        $pengembalian = DB::table('pinjam')
        ->join('buku', 'buku.buku_id', '=', 'pinjam.buku_id')
        ->join('anggota', 'anggota.anggota_id', '=', 'pinjam.anggota_id')
        ->join('kembali' , 'pinjam.pinjam_id', '=', 'kembali.pinjam_id')
        ->select('buku.buku_judul','buku.buku_id', 'pinjam.tgl_pinjam', 'pinjam.tgl_jatuh_tempo' ,'kembali.kembali_id' ,'kembali.tgl_kembali' ,'anggota.anggota_nama','anggota.anggota_id')
        ->paginate(10);

        return view('list-pengembalian',['pengembalian' => $pengembalian]);
    }

    public function kembali($id)
    {
        $kembali = DB::table('pinjam')->where('pinjam_id',$id)->first();
        $buku = Buku::find($kembali->buku_id);
        $anggota = Anggota::find($kembali->anggota_id);

        $aa = Carbon::parse(date('Y-m-d'));
        $bb = Carbon::parse($kembali->tgl_jatuh_tempo);
        $cc = $aa->diffInDays($bb);

        if ($aa < $bb) {
            $denda =0;
        } else {
            $denda = 500 * $cc;
        }

        return view('kembali',['kembali' => $kembali, 'buku' => $buku, 'anggota' => $anggota, 'denda' => $denda]);
    }

    public function store(Request $request)
    {
        // insert data ke table anggota
        DB::table('kembali')->insert([
            'pinjam_id' => $request->pinjam_id,
            'tgl_kembali' => $request->kembali,
            'denda' => $request->denda
        ]);
        // alihkan halaman ke halaman anggota
        return redirect('/list-pengembalian');
 
    }
    public function hapus($id)
    {
        DB::table('pinjam')->where('pinjam_id',$id)->delete();
        
        return redirect('/list-pengembalian');
    }
}
