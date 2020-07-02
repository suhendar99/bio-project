<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Perangkat extends Model
{
	use LogsActivity;
    protected $table = "perangkats";
    protected $primarykey = "id";
    protected $fillable = [
        'no_seri', 'latitude', 'longitude', 'tgl_aktivasi', 'status'
    ];

    /**
     * Perangkat has many Monitoring.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function monitoring()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = perangkat_id, localKey = id)
    	return $this->hasMany('App\Monitoring', 'perangkat_id', 'no_seri');
    }

}
