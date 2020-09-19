<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public  function user(){
        return $this->belongsTo('App\user');
    }
    public  function profile_project(){
        return $this->hasMany('App\profile_project');
    }
}
