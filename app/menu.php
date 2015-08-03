<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['title'];
    public $timestamps = false;

    public function menuItems()
    {
        return $this->hasMany('App\menuItems', 'menuId');
    }
    public static function getEagerLoad($id){
        return menu::with('menuItems')->find($id);
    }
}
