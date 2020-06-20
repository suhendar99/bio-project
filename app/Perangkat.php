<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    protected $table = "perangkats";
    protected $primarykey = "id_perangkat";
    protected $fillable = [
        'no_seri', 'latitude', 'longitude', 'tgl_aktivasi', 'user_id', 'instansi', 'no_tlp', 'status'
    ];

    
}
