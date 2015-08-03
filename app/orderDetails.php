<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    protected $table = 'orderDetails';
    protected $fillable = ['orderId','fullName','email','age'];
    protected $hidden = ['orderId'];
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo('App\orders', 'orderId');
    }
    public static function getEagerLoad($id){
        return orderDetails::with('order')->find($id);
    }
}
