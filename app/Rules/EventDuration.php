<?php

namespace App\Rules;

use App\Event;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class EventDuration implements Rule
{

    private $start;

    public function __construct($start)
    {
        $this->start = $start;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     * @throws \Exception
     */
    public function passes($attribute, $value)
    {
        $startEvent = new Carbon($this->start);
        $endEvent = new Carbon($value);

        return !(($endEvent->getTimestamp() - $startEvent->getTimestamp()) % (Event::DURATION_IN_MINUTES * 60));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
