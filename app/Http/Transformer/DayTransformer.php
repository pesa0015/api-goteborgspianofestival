<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Day;

class DayTransformer extends Fractal\TransformerAbstract
{
    protected $defaultIncludes = [
        'events'
    ];

    public function transform(Day $day)
    {
        return [
            'date'  => $day->date,
            'month' => Day::MONTH
        ];
    }

    /**
     * Include activities
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeEvents(Day $day)
    {
        $events = $day->events;

        return $this->collection($events, new EventTransformer);
    }
}
