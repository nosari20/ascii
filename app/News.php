<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    
    public function writer(){
        return $this->belongsTo('App/User', 'user', 'id');
    }
}
