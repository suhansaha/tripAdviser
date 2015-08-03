<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $table = 'tags';
    protected $fillable = ['tag'];
    public $timestamps = false;

    public function products(){
        return $this->belongsToMany('App\products','productTag','tagId', 'productId');
    }
    public static function getEagerLoad($id){
        return tags::find($id);
    }
}
