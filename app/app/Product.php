<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function file(){
        return $this->hasMany('App\File');
    }

    public function orderd_item(){
        return $this->hasMany('App\Orderd_item');
    }

    public function Product_likes(){
        return $this->hasMany('App\Product_like');
    }
}
