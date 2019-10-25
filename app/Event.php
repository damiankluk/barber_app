<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const DURATION_IN_MINUTES = 30;
    protected $fillable = ['start', 'end'];
}
