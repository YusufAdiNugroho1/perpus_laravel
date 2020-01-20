<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RakBuku extends Model
{
    protected $table = 'rak_buku';

    public $timestamps = false;

    public function buku(){
    	return $this->belongsTo(buku::class, 'buku_id', 'buku_id');
    }

    public function rak(){
    	return $this->belongsTo(rak::class, 'rak_id', 'rak_id');
    }
}
