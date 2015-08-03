<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['customerId','shippingAddressId','billingAddressId','status'];
    protected $hidden = ['customerId'];

    public function orders(){
        return $this->hasMany('App\orders','cartId');
    }
    public function customer(){
        return $this->belongsTo('App\User','customerId');
    }
    public static function getEagerLoad($id){
        return reviews::with('orders','customer')->find($id);
    }
}
