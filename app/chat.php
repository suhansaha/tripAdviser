<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $table = 'chat';
    public $fillable = ['customerId','chat','direction'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'customerId');
    }
}
