<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Publication extends Model
{
    protected $fillable = ['title', 'author', 'datepub', 'body', 'pubpic', 'approved'];

    public static function approvedpub(){
        return static::where('approved', 1)->get();
    }

    public static function authored_by($author){
        return static::where('author', $author)->get();
    }
}
