<?php

namespace App\Repositories;

use App\Event;

class EventRepository
{

    public static function getByDate(\DateTime $dateTime)
    {
        $startDay = $dateTime->format('Y-m-d 00:00:00');
        $endDay = $dateTime->format('Y-m-d 23:59:59');

        return Event::where('start', '<=', $startDay)->where('end', '>=', $endDay);
    }
}
