<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    protected $table = "perangkats";
    protected $primarykey = "id";
    protected $fillable = [
        'no_seri', 'latitude', 'longitude', 'tgl_aktivasi', 'status'
    ];


    
}
