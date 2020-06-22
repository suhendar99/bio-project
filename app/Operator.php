<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = "users";
    protected $primarykey = "id";
    protected $fillable = [
        'name', 'email', 'password', 'nik','no_hp', 'foto'
    ];
}
