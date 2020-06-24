<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Operator extends Model
{
	use LogsActivity;
    protected $table = "users";
    protected $primarykey = "id";
    protected $fillable = [
        'name', 'email', 'password', 'nik','no_hp', 'foto'
    ];
}
