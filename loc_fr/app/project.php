<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table='projects';
    public $primaryKey='project_id';
    public $timestamps = true;
}
