<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class productController extends Controller
{
    public function create(){
        return view('backend.createProduct');
    }
    public function store(Request $request)
    {
        dd($request->all());
        return "Suhan Saha";
    }
}
