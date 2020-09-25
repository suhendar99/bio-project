<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_alert extends Model
{
    protected $guarded = [];

    public function monitoring()
    {
    	return $this->belongsTo('App\Monitoring', 'monitoring_id', 'id_monitoring');
   	}
}
