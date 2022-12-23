<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword; 

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','class_id','birth','address','payment',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes(){
        return $this->belongsToMany('App\User','user_likes','likes_id','id');

    }

    public function be_liked(){
        return $this->belongsToMany('App\User','User_likes','be_liked_id','id');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function file(){
        return $this->hasOne('App\File');
    }

    public function product_likes()
    {
        return $this->hasMany('App\product_like');
    }

    public function orderd_items()
    {
        return $this->hasMany('App\Orderd_item');
    }

    /**
  * パスワードリセット通知の送信
  *
  * @param string $token
  * @return void
  */
  public function sendPasswordResetNotification($token)
  {
    $this->notify(new ResetPassword($token));
  }
}  