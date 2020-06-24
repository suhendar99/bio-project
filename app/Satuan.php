<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Satuan extends Model
{
	use LogsActivity;

    protected $table = 'satuans';
    protected $fillable = [
    	'parameter','satuan','max','min','id_ruangan'
    ];

    public function ruangan()
    {
        return $this->belongsTo('App\Ruangan','id_ruangan','id');
    }
}
