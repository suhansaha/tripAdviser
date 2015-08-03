<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menuItems extends Model
{
    protected $table = 'menuItems';
    protected $fillable = ['title','link','parentId','menuId'];
    public $timestamps = false;
    protected $hidden = ['menuId'];

    public function menu()
    {
        return $this->belongsTo('App\menu', 'menuId');
    }
    
    public static function getEagerLoad($id){
        return menuItems::with('menu')->find($id);
    }
}
