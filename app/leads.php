<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leads extends Model
{
    protected $fillable = ['fullName','email','package'];
}
