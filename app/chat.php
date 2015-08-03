<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $table = 'chat';
    protected $fillable = ['customerId','chat','direction'];
    protected $hidden = ['customerId'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'customerId');
    }
    
    public static function getEagerLoad($id){
        return chat::with('customer')->find($id);
    }
}
