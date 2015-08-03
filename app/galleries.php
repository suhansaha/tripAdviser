<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galleries extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['title'];
    public $timestamps = false;
    public function images(){
        return $this->belongsToMany('App\images','galleryImages','imageId','galleryId');
    }
    
    public static function getEagerLoad($id){
        return galleries::with('images')->find($id);
    }
}
