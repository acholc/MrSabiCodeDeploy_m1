<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class blog_comments extends Model
{
    use SoftDeletes;    
   protected $table='blog_comments';
   
    public function blog_info()
    {
        return $this->belongsTo('App\Blog','blog_id');
    }
    
     public function user_info()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
