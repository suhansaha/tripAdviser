<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['customerId','productId','title','comment','rating'];
    protected $hidden = ['customerId'];
    public function customer()
    {
        return $this->belongsTo('App\User', 'customerId');
    }
    public function product()
    {
        return $this->belongsTo('App\products', 'productId');
    }
    
    public static function getEagerLoad($id){
        return reviews::with('customer')->find($id);
    }
}
