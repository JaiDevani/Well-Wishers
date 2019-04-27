<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    //
    protected $table='teachers';
    public $primaryKey='teacher_id';
    public $timestamps = true;
}
