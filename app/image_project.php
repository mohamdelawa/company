<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image_project extends Model
{
    public  function profile_project(){
        return $this->belongsTo('App\profile_project');
    }
}
