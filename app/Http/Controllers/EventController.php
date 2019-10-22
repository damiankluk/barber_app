<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;

class EventController extends Controller
{
    public function index(string $date = 'NOW')
    {
        $validator = Validator::make(['date' => $date], ['date' => 'required|datetime'])->validate();

        $dateTime = new \DateTime($date);

        $events = EventRepository::getByDate($dateTime);

        return response()->json([
            'events' => $events
        ]);
    }
}
