<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class authController extends Controller
{
    public function login(Request $request){

        if (Auth::attempt(['email' => $request->email,'password'=>$request->password])) {
            // Authentication passed...
            return redirect()->intended();
        }

        $showModal = 'true';
        $message = '';
        return view('homepage',['showModal'=>$showModal,'message'=>$message]);
    }
    public function callback($driver, \App\AuthenticateUser $authenticateUser, Request $request){
        //return "Login using ".$driver;
        return $authenticateUser->execute($request->has('code'), $driver, $this);
    }
    public function userHasLoggedIn($user){
        return redirect()->intended();

    }

}
