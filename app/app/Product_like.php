<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_like extends Model
{
    public function user(){
        return $this->belongsToMany('App\User');
    }

    public function product(){
        return $this->belongsToMany('App\Product');
    }
}
