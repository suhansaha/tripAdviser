<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $fillable = ['SKU','price','currencyId','publishDate','coverImageId',
        'videoUrl','cityId','vendorId','active'];
    public $timestamps = false;
    protected $hidden = ['currencyId','coverImageId','cityId','vendorId'];

    public function text()
    {
        return $this->hasOne('App\stringList','productId');
    }

    public function currency()
    {
        return $this->belongsTo('App\currencies','currencyId');
    }

    public function coverImage()
    {
        return $this->belongsTo('App\images','coverImageId');
    }

    public function city()
    {
        return $this->belongsTo('App\cities','cityId');
    }
    public function availabilities()
    {
        return $this->hasMany('App\availability', 'productId');
    }
    public function reviews()
    {
        return $this->hasMany('App\reviews', 'productId');
    }
    public function vendor(){
        return $this->belongsTo('App\User','vendorId');
    }
    public function categories(){
        return $this->belongsToMany('App\categories','productCategory','categoryId','productId');
    }
    public function tags(){
        return $this->belongsToMany('App\tags','productTag','tagId','productId');
    }
    public function orders(){
        return $this->belongsToMany('App\orders','productOrder','orderId','productId');
    }
    public function images(){
        return $this->belongsToMany('App\images','productOrder','imageId','productId');
    }
    
    public static function getEagerLoad($id){
        return products::with('text','currency','coverImage','city','availabilities','vendor','categories','tags','images')->find($id);
    }

}
