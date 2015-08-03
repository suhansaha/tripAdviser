<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inbox extends Model
{
    protected $table = 'inbox';
    protected $fillable = ['subject','body','customerId','emailId','direction'];
    protected $hidden = ['customerId'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'customerId');
    }
    public static function getEagerLoad($id){
        return inbox::with('customer')->find($id);
    }
}
