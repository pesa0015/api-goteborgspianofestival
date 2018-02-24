<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Activity;

class ActivityTransformer extends Fractal\TransformerAbstract
{
    public function transform(Activity $activity)
    {
        return [
            'start'       => $activity->start,
            'end'         => $activity->end,
            'name'        => $activity->name,
            'description' => $activity->description,
            'location'    => $activity->location->name,
            'room'        => $activity->room ? $activity->room->name : null
        ];
    }
}