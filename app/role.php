<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public  function user_role(){
        return $this->hasMany('App\user_role');
    }

}
