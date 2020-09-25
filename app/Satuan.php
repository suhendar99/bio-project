<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Satuan extends Model
{
	use LogsActivity;

    
    protected $guarded = [];

    public function ruangan()
    {
        return $this->belongsTo('App\Ruangan','id_ruangan','id');
    }
}
