<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['productId','cartId','adults','children','price'];
    protected $hidden = ['productId','cartId'];

    public function orderDetails(){
        return $this->hasMany('App\orderDetails','orderId');
    }
    public function cart()
    {
        return $this->belongsTo('App\cart', 'cartId');
    }
    public function products(){
        return $this->belongsToMany('App\products','productOrder','orderId', 'productId');
    }
    public static function getEagerLoad($id){
        return orders::with('cart','products')->find($id);
    }
}
