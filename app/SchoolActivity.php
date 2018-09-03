<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolActivity extends Model
{
    protected $fillable = ['title', 'description', 'datestart', 'dateend'];

}
