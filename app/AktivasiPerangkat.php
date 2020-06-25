<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivasiPerangkat extends Model
{
    protected $table = 'aktivasi_perangkats';
    protected $fillable = [
    	'id_perangkat','id_ruangan'
    ];

    public function ruangan()
    {
    	return $this->belongsTo('App\Ruangan','id_ruangan','id');
    }

    public function perangkat()
    {
    	return $this->belongsTo('App\Perangkat','id_perangkat','id');
   	}
}
