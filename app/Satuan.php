<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuans';
    protected $fillable = [
    	'parameter','satuan','max','min','id_ruangan'
    ];

    public function ruangan()
    {
        return $this->belongsTo('App\Ruangan','id_ruangan','id');
    }
}
