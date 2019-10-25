<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const DURATION_IN_MINUTES = 30;
    protected $fillable = ['start', 'end', 'barber_id', 'client_id'];

    public function barber()
    {
        return $this->belongsTo('App\Barber', 'foreign_key', 'barber_id');
    }
}
