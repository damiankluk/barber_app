<?php

namespace App\Rules;

use App\Repositories\EventRepository;
use Illuminate\Contracts\Validation\Rule;

class EventOverlaps implements Rule
{
    private $end;

    public function __construct($end)
    {
        $this->end = $end;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $eventRepository = new EventRepository();

        $events = $eventRepository->getByDate($value, $this->end);

        return $events->isEmpty();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Event is overlaped by another event.';
    }
}
