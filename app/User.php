<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstName', 'lastName', 'email', 'password','roleId'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token','fbid','gid','created_at','updated_at','roleId'];

    public function role()
    {
        return $this->belongsTo('App\Roles', 'roleId');
    }
    public function contacts(){
        return $this->hasMany('App\addresses','userId');
    }
    public function chats(){
        return $this->hasMany('App\chat','customerId');
    }
    public function emails(){
        return $this->hasMany('App\inbox','customerId');
    }
    public function phones(){
        return $this->hasMany('App\phone','customerId');
    }
    public function carts(){
        return $this->hasMany('App\cart','customerId');
    }
    public function reviews()
    {
        return $this->hasMany('App\reviews', 'customerId');
    }
    public function products()
    {
        return $this->hasMany('App\products', 'vendorId');
    }
    public static function getEagerLoad($id){
      return User::with('role','contacts','chats','emails','phones','carts','reviews','products')->find($id);
    }
}
