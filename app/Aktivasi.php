<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aktivasi extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activity_log';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['log_name', 'description', 'subject_id', 'subject_type', 'causer_id', 'causer_type', 'properties'];
}
