<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
