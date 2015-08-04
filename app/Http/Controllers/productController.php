<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class productController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function create(){
        return view('backend.createProduct');
    }
    public function store(Request $request,$id=null)
    {
        $product = null;
        if($id==null){
          $product = \App\products::firstOrNew(['SKU'=>$request->sku]);
        }else{
          $product = \App\products::find($id);
        }
        
        $image = null;
        $product->coverImageId = null;
        if($request->hasFile('coverImage') && $request->file('coverImage')->isValid()){
            $imageName = 'images/'.$request->file('coverImage')->getClientOriginalName();
            $image = \App\images::firstOrNew(['url'=>$imageName]);
            $image->title = $request->file('coverImage')->getClientOriginalName();
            $image->save();
            $request->file('coverImage')->move('images',$imageName);
            $product->coverImageId = $image->id;
        }
        
        $product->SKU = $request->sku;
        $product->price = $request->price;
        $product->currencyId = $request->currency;
        $product->publishDate = date('Y-m-d', strtotime($request->publishDate));
        $product->cityId = $request->city;
        $product->vendorId = $request->vendor;
        $product->active = $request->Active;
        $product->save();
                
        $text = \App\stringList::firstOrNew(['alias'=>$request->alias]);
        $text->alias = $request->alias;
        $text->title = $request->title;
        $text->description = $request->description;
        $text->condition = $request->condition;
        $text->productId = $product->id;
        $text->languageId = 1;
        $text->save();
        
        $count = 1;
                
        $product->images()->detach();
        while(1){
            $image = null;
            $fileName = 'image'.$count;
            if($request->hasFile($fileName) && $request->file($fileName)->isValid()){
                $imageName = 'images/'.$request->file($fileName)->getClientOriginalName();
                $image = \App\images::firstOrNew(['url'=>$imageName]);
                $image->title = $request->file($fileName)->getClientOriginalName();
                $image->save();
                $request->file($fileName)->move('images',$imageName);
                $product->images()->attach($image->id);
                $count++;
            }else{
                break;
            }
        }
        
        return $product->all()->load('text','currency','coverImage','city','vendor','images');
    }
    public function edit($id)
    {
      $product = \App\products::find($id);
      if($product!=null){
        return view('backend.updateProduct',['product'=>$product]);
      }else{
        return view('backend.createProduct');
      }
    }    
    public function update(Request $request,$id)
    {
      return $this->store($request,$id);
    }
}