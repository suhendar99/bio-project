<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'setlaporan';
    protected $fillable = [
    	'header_img','icon','footer','id_operator'
    ];
}
