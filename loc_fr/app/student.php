<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table='students';
    public $primaryKey='student_id';
    public $timestamps = true;
}
