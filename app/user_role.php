<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    public  function user(){
        return $this->belongsTo('App\user');
    }
    public  function role(){
        return $this->belongsTo('App\role');
    }

}
