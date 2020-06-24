<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Monitoring extends Model
{
    use LogsActivity;
    protected $table = "monitoring";
    protected $primarykey = "id_monitoring";
    protected $fillable = [
        'suhu','kelembapan','tekanan','cahaya','alarm','perangkat_id','ruangan_id'
    ];

    public function ruangan()
    {
    	return $this->belongsTo('App\Ruangan');
    }

    public function perangkat()
    {
    	return $this->belongsTo('App\Perangkat');
   	}

    /**
     * Monitoring has many Alarm.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alarm()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = monitoring_id, localKey = id)
        return $this->hasMany('App\Log', 'monitoring_id', 'id');
    }
}
