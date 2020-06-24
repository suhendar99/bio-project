<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Laporan extends Model
{
	use LogsActivity;
    protected $table = 'setlaporan';
    protected $primarykey ="id";
    protected $fillable = [
    	'header_img','icon','footer','id_operator'
    ];
}
