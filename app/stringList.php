<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stringList extends Model
{
    protected $table = 'stringList';
    protected $fillable = ['title','description','productId','languageId'];
    protected $hidden = ['productId','languageId'];
    public $timestamps = false;

    public function language()
    {
        return $this->belongsTo('App\languages', 'languageId');
    }
    public function product()
    {
        return $this->belongsTo('App\products', 'productId');
    }
    public static function getEagerLoad($id){
        return stringList::with('language','product')->find($id);
    }
}
