<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class rating extends Model
{
    use SoftDeletes;    
   protected $table='rating';
   
   public function listing_info()
    {
        return $this->belongsTo('App\listing','id');
    }
    
     public function user_info()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
