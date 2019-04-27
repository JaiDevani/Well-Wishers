<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    //
    protected $table='schools';
    public $primaryKey='school_id';
    public $timestamps = true;
}
