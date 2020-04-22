<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class listing extends Model
{    use SoftDeletes; 
    protected $table ='listings';
}
