<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class languages extends Model
{
    protected $table = 'languages';
    protected $fillable = ['language','label','symbol'];
    public $timestamps = false;

    public function strings(){
        return $this->hasMany('App\stringList','stringListId');
    }
}
