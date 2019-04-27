<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteeer extends Model
{
    //
    protected $table='volunteeers';
    public $primaryKey='id';
    public $timestamps = true;
}
