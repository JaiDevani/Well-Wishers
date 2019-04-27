<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temp_User extends Model
{
    protected $table='temp__users';
    public $primaryKey='id';
    public $timestamps = true;
}
