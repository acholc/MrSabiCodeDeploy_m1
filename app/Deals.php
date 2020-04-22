<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deals extends Model
{
    use SoftDeletes;    
    
    
    protected $table='deals';
    
    public function business_info()
    {
        return $this->belongsTo('App\listing','business_name');
    }
    
}
