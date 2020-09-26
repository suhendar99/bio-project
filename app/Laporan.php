<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Laporan extends Model
{
	use LogsActivity;
	protected $table = "setlaporans";
    protected $guarded = [''];

    protected static $logAttribute = [
    	'header_img','icon','footer','id_operator'
    ];
}

?>
