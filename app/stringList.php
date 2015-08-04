<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stringList extends Model
{
    protected $table = 'stringList';
    protected $fillable = ['title','description','condition','productId','languageId'];
    public $timestamps = false;

    public function language()
    {
        return $this->belongsTo('App\languages', 'languageId');
    }
    public function product()
    {
        return $this->belongsTo('App\products', 'productId');
    }
}
