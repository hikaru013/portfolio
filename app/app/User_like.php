<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_like extends Model
{
    public function likes(){
        return $this->belongsTo('App\User');
    }

    public function be_liked(){
        return $this->belongsTo('App\User');
    }
}
