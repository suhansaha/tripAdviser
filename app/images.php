<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $table = 'images';
    protected $fillable = ['title','url'];
    public $timestamps = false;

    public function productsCover()
    {
        return $this->hasMany('App\products', 'coverImageId');
    }
    public function cities(){
        return $this->hasMany('App\cities','imageId');
    }
    public function categories(){
        return $this->hasMany('App\categories','imageId');
    }
    public function galleries(){
        return $this->belongsToMany('App\galleries','galleryImages','galleryId','imageId');
    }
    public function products(){
        return $this->belongsToMany('App\products','productImages','productId','imageId');
    }
}
