<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table='logs';

    protected $fillable = [
    	'status','keterangan', 'monitoring_id'
    ];

    /**
     * Log belongs to Monitoring.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Monitoring()
    {
    	// belongsTo(RelatedModel, foreignKey = monitoring_id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\Monitoring', 'monitoring_id', 'id');
    }
}
