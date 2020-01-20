<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    public $timestamps = false;

    protected $fillable = [
    	"kategori_nama","kategori_id"
    ];

    protected $id = 'kategori_id';
}
