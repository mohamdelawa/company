<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class profile_project extends Model
{

    public  function profile(){
        return $this->belongsTo('App\profile');
    }
    public  function project(){
        return $this->belongsTo('App\project');
    }
    public  function image_project(){
        return $this->hasMany('App\image_project');
    }
}
