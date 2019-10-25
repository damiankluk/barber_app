<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function client()
    {
        return $this->belongsTo('App\Client', 'foreign_key', 'client_id');
    }
}
