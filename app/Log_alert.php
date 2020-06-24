<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Log_alert extends Model
{
    
	use LogsActivity;
}
