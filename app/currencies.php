<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class currencies extends Model
{
    protected $table = 'currencies';
    protected $fillable = ['name','symbol','rate'];
    public $timestamps = false;

    public function products(){
        return $this->hasMany('App\products','currencyId');
    }
    public static function getEagerLoad($id){
        return currencies::with('products')->find($id);
    }
}
