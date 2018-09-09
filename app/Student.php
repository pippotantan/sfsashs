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

<<<<<<< HEAD
=======
    public function klases(){
        return $this->hasMany('App\User');
    }



>>>>>>> b2ea6dbecce7924d186d81939849927a6259fc65
}
