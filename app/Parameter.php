<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
	use LogsActivity;
    protected $table ="setparameters";
    protected $primarykey ="id_setting";

    protected $fillable = [
        'suhu', 'kelembapan','cahaya', 'alarm', 'tekanan'
    ];
}
