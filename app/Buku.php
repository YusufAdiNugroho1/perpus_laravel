<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    public $timestamps = false;

    public function kategori(){
    	// return $this->hasOne('App\Kategori', 'kategori_id', 'kategori_id');
    	// return $this->hasOne(Kategori::class, 'kategori_id', 'kategori_id');
    	return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }
    protected $fillable = [
    	"buku_id","buku_judul","buku_cover"
    ];
}
