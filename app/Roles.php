<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "roles";
    protected $fillable = ['title'];
    public $timestamps = false;

    public function users(){
        return $this->hasMany('App\User','roleId');
    }
    public static function getEagerLoad($id){
        if($id)
          return Roles::find($id);
        else
          return Roles::all();
    }
}
