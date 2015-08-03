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
    public function store(Request $request)
    {
        if($request->hasFile('coverImage') && $request->file('coverImage')->isValid()){
            $request->file('coverImage')->move('images',$request->file('coverImage')->getClientOriginalName());
        }
        dd($request->all());
        return "Suhan Saha";
    }
}
