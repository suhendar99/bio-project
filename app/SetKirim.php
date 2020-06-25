<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SetKirim extends Model
{
	use LogsActivity;
    protected $table="set_kirims";
    protected $primarykey = "id";
    protected $fillable = [
        'id_operator','status_kirim','waktu_kirim'
    ];  

    public function Operator()
    {
        return $this->belongsTo('App\Operator','id_operator','id');
    }

}
