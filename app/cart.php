<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['customerId','shippingAddressId','billingAddressId','status'];

    public function orders(){
        return $this->hasMany('App\orders','cartId');
    }
    public function customer(){
        return $this->belongsTo('App\User','customerId');
    }
}
