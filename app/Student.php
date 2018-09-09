<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   
    public function strand(){
        return $this->hasOne('App\Strand');
    }

    public function account(){
        return $this->hasOne('App\User');
    }

    public function klases(){
        return $this->hasMany('App\User');
    }



}
