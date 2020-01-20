<?php
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'IndexController@index');
Route::get('/index/cari','IndexController@cari');
Route::get('/buku','BukuController@buku');
Route::get('/buku/tambah_buku','BukuController@tambah');
Route::post('/buku/store','BukuController@store');
Route::get('/buku/edit_buku/{id}','BukuController@edit');
Route::post('/buku/update','BukuController@update');
Route::get('/buku/hapus/{id}','BukuController@hapus');
Route::get('/kategori','KategoriController@kategori');
Route::get('/kategori/tambah_kategori','KategoriController@tambah');
Route::post('/kategori/store', 'KategoriController@store');
Route::get('/kategori/edit_kategori/{id}','KategoriController@edit');
Route::post('/kategori/update','KategoriController@update');
Route::get('/kategori/hapus/{id}','KategoriController@hapus');
Route::get('/anggota','AnggotaController@anggota');
Route::get('/anggota/tambah_anggota','AnggotaController@tambah');
Route::post('/anggota/store','AnggotaController@store');
Route::get('/anggota/edit_anggota/{id}','AnggotaController@edit');
Route::post('/anggota/update','AnggotaController@update');
Route::get('/anggota/hapus/{id}','AnggotaController@hapus');
Route::get('/rak','RakController@rak');
Route::get('/rak/tambah_rak','RakController@tambah');
Route::post('/rak/store', 'RakController@store');
Route::get('/rak/edit_rak/{id}','RakController@edit');
Route::post('/rak/update','RakController@update');
Route::get('/rak/hapus/{id}','RakController@hapus');
Route::get('/rak_buku', 'RakBukuController@rak_buku');
Route::get('/rak_buku/cari','RakBukuController@cari');
Route::get('/rak_buku/tambah_rak_buku','RakBukuController@tambah');
Route::post('/rak_buku/store', 'RakBukuController@store');
Route::get('/rak_buku/hapus/{id}','RakBukuController@hapus');
Route::get('/pinjam/kembali/{id}', 'PinjamController@kembali');
Route::get('/list_pengembalian', 'PengembalinController@list_pengembalian');
Route::get('/pinjam', 'PinjamController@pinjam');
Route::get('/pinjam/tambah_pinjam','PinjamController@tambah');
Route::post('/pinjam/store','PinjamController@store');
Route::get('/pinjam/hapus/{id}','PinjamController@hapus');
Route::get('/list-pengembalian', 'PengembalianController@pengembalian');
Route::get('/list-pengembalian/hapus/{id}','PengembalianController@hapus');
Route::get('coba', function(){
	return DB::select("
			SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, anggota.anggota_nama,
	(SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN anggota ON anggota.anggota_id = pinjam.anggota_id
		");
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
