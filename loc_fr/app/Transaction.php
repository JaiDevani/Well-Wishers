<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table='transactions';
    public $primaryKey='id';
    public $timestamps = true;
}
