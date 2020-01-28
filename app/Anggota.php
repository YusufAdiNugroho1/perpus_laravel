<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $primaryKey = 'anggota_id';
    
    public $timestamps = false;

    protected $fillable = [
    	"anggota_id","anggota_nama"
    ];
}
