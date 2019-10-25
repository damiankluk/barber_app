<?php

namespace App\Http\Controllers;

use App\Event;
use App\Repositories\EventRepository;
use App\Rules\EventDuration;
use App\Rules\EventOverlaps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(string $date = 'NOW', EventRepository $eventRepository)
    {
        $dateTime = new \DateTime($date);

        $date = $dateTime->format('Y-m-d');

        $validator = Validator::make(['date' => $date], [
            'date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $slots = [
            'openDate' => $dateTime->format('Y-m-d 08:00:00'),
            'closeDate' => $dateTime->format('Y-m-d 20:00:00'),
            'duration' => Event::DURATION_IN_MINUTES
        ];

        return response()->json([
            'events' => $eventRepository->getByDate($slots['openDate'], $slots['closeDate']),
            'slots' =>$slots
        ]);
    }

    public function show(Event $event)
    {
        return $event;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start' => ['required', 'date', 'before:end', new EventOverlaps($request->get('end'))],
            'end' => ['required', 'date', new EventDuration($request->get('start'))]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $event = Event::create($request->all());

        return response()->json($event, 201);
    }

    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'start' => ['required', 'date', 'before:end', new EventOverlaps($request->get('end'))],
            'end' => ['required', 'date', new EventDuration($request->get('start'))]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $event->update($request->all());

        return response()->json($event, 200);
    }

    public function delete(Event $event)
    {
        $event->delete();

        return response()->json(null, 204);
    }
}
