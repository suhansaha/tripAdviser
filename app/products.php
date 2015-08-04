<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $fillable = ['SKU','price','currencyId','publishDate','coverImageId',
        'videoUrl','cityId','vendorId','active'];
    public $timestamps = false;

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
        return $this->belongsToMany('App\categories','productCategory','productId','categoryId');
    }
    public function tags(){
        return $this->belongsToMany('App\tags','productTag','tagId','productId');
    }
    public function orders(){
        return $this->belongsToMany('App\orders','productOrder','productId','orderId');
    }
    public function images(){
        return $this->belongsToMany('App\images','productImages','productId','imageId');
    }

}
