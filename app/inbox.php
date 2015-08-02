<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inbox extends Model
{
    protected $table = 'inbox';
    protected $fillable = ['subject','body','customerId','emailId','direction'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'customerId');
    }
}
