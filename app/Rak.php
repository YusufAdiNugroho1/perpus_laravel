<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = 'rak';

    public $timestamps = false;

    protected $fillable = [
    	"rak_id","rak_nama"
    ];
}
