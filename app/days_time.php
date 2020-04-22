<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class days_time extends Model
{   use SoftDeletes;  
   protected $table='days_time';
}
