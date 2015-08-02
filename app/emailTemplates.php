<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emailTemplates extends Model
{
    protected $table = 'emailTemplates';
    protected $fillable = ['subject','body'];
    public $timestamps = false;
}
