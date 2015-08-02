<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability extends Model
{
    protected $table = 'availability';
    protected $fillable = ['productId','date','quantity'];
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo('App\products', 'productId');
    }
}
