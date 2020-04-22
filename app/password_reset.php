<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class password_reset extends Model
{  use SoftDeletes; 
   protected $table='password_resets';
}
