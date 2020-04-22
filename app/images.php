<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class images extends Model
{   use SoftDeletes; 
   protected $table='images';
}
