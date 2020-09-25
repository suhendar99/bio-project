<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $guarded = [];

    public function ruangan()
    {
    	return $this->belongsTo('App\Ruangan');
    }

    public function perangkat()
    {
    	return $this->belongsTo('App\Perangkat', 'perangkat_id', 'no_seri');
   	}

    /**
     * Monitoring has many Alarm.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alert()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = monitoring_id, localKey = id)
        return $this->hasMany('App\Log_alert', 'monitoring_id', 'id_monitoring');
    }
}
