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
        'no_seri','kode', 'latitude', 'longitude', 'tgl_aktivasi', 'status'
    ];



}
