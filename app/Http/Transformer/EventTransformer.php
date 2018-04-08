<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Event;

class EventTransformer extends Fractal\TransformerAbstract
{
    public function transform(Event $event)
    {
        return [
            'start'       => $event->start,
            'end'         => $event->end,
            'name'        => $event->t('name'),
            'description' => $event->t('description'),
            'location'    => $event->location->name,
            'room'        => $event->room ? $event->room->name : null
        ];
    }
}
