<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('homepage',['showModal'=>'false','message'=>'']);
});

Route::post('/', function () {
    return view('homepage',['showModal'=>'false','message'=>'']);
});

Route::get('/logout', function () {
    Auth::logout();
    return Redirect::back();
});

Route:get('product/{alias}',function($alias){
    $text = \App\stringList::where('alias',$alias)->first();
    if($text!=null){
        return view('product',['text'=>$text]);
    }else{
        abort('404');
    }
});

Route::get('order/{package}',function($package){

    $showModal = 'true';
    $message = '';

    if(Auth::check()){
        $lead = new App\leads();

        $lead->fullName = Auth::user()->firstName.' '.Auth::user()->lastName;
        $lead->email = Auth::user()->email;
        $lead->package = str_replace('_',' ',$package);
        $lead->save();

        $message = "<p>Dear ".Auth::user()->firstName.",<p/>";
        $message .= "<p>We are delighted to hear that you are interested for the package \"".$lead->package."\".</p>";
        $message .= "<p>However we are not yet ready to provide you the gala experience we promise to our customer.</p>";
        $message .= "<p>We promise that we will get back to you via your email id ".Auth::user()->email." as soon as we are ready.</p>";
        $message .="Your Sincerely,<br/>TripAdviser Team";

    }
   return Redirect::back()->with('showModal',$showModal)->with('message',$message);
});

Route::resource('admin/products','productController',['only'=>['store','create']]);
Route::resource('admin/{table}','adminController',['only'=>['index','store','create']]);
//Route::resource('admin/{table}','adminController');
Route::get('admin/{table}/{id}','adminController@show');
Route::get('admin/{table}/{id}/{field}','adminController@showField');
Route::get('admin/{table}/{id}/{field}/{fieldField}','adminController@showField');

Route::get('login','authController@login');
Route::post('login','authController@login');
Route::get('{driver}/callback','authController@callback');
Route::post('{driver}/callback','authController@callback');
