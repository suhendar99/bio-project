<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangans';
    protected $fillable = [
    	'foto','nama'
    ];

    public function Monitoring()
    {
        return $this->hasOne('App\Monitoring');
    }
}
