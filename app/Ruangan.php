<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangans';
    protected $primarykey = "id";
    protected $fillable = [
    	'foto','nama'
    ];

    public function monitoring()
    {
    	return $this->hasOne('App\Monitoring')->orderBy('created_at', 'desc');
    }
    public function satuan()
    {
        return $this->hasMany('App\Satuan','id','id_ruangan');
    }
}
