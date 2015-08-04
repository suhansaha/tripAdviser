<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['title'];
    public $timestamps = false;

    public function products(){
        return $this->belongsToMany('App\products','productCategory','categoryId', 'productId');
    }
    public function image(){
        return $this->belongsTo('App\images','imageId');
    }
}
