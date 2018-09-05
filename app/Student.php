<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function subjects(){
        return $this->hasMany('App\Subject');
    }

    public function strand(){
        return $this->hasOne('App\Strand');
    }

}
