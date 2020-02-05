<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function userr()
    {
        return $this->belongsTo('App\User','user');
    }
    public function reports()
    {
        return $this->hasMany('App\Report');
    }

}
