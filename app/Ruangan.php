<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Ruangan extends Model
{
    use LogsActivity;
    
    protected $guarded = [];

    public function monitoring()
    {
    	return $this->hasOne('App\Monitoring')->orderBy('created_at', 'desc');
    }
    public function satuan()
    {
        return $this->hasMany('App\Satuan','id','id_ruangan');
    }
}
