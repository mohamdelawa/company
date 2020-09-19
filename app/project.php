<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class project extends Model
{
    use SoftDeletes;
    public  function profile_project(){
        return $this->hasMany('App\profile_project');
    }

}
