<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability extends Model
{
    protected $table = 'availability';
    protected $fillable = ['productId','date','quantity'];
    protected $hidden = ['productId'];
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo('App\products', 'productId');
    }
    
    public static function getEagerLoad($id){
        return availability::with('product')->find($id);
    }
}
