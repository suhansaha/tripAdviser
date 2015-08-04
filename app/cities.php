<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name','country','imageId'];
    public $timestamps = false;

    public function products(){
        return $this->hasMany('App\products','cityId');
    }
    public function image(){
        return $this->belongsTo('App\images','imageId');
    }
}
