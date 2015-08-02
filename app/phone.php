<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    protected $table = 'phone';
    protected $fillable = ['customerId','note'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'customerId');
    }
}
