<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    public $timestamps = false;

    public function files()
    {
        return $this->hasMany('App\File');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
