<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //Productsテーブルのid＝Filesテーブルのproduct_id
    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    // public function file(){
    //     return $this->belongsTo('App\File');
    // }
}
