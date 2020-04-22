<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class favourite_listings extends Model
{  use SoftDeletes;
   protected $table='favourite_listings';
}
