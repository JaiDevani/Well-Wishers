<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table='branches';
    public $primaryKey='id';
    public $timestamps = true;
}
