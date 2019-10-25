<?php

namespace App\Repositories;

use App\Event;

class EventRepository
{

    public function getByDate(string $openDate, string $closeDate)
    {
        return Event::where('start', '>=', $openDate)->where('end', '<=', $closeDate)->get();
    }
}
