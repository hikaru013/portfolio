<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id', 
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function file(){
        return $this->hasMany('App\File');
    }
    

    public function orderd_item(){
        return $this->hasMany('App\Orderd_item');
    }

    

    public function product_likes(){
        return $this->hasMany('App\Product_like');
    }

    public function isLikedBy($user): bool {
        return product_like::where('user_id', $user->id)->where('product_id', $this->id)->first() !==null;
    }
}
