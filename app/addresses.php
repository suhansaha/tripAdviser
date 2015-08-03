<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    protected $table = 'addresses';
    protected $fillable = ['title','line1','line2','houseNo','city',
        'State', 'country','pinCode','type','phoneNo','userId'];

    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
    public static function getEagerLoad($id){
        return reviews::with('user')->find($id);
    }
}
