<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Day;

class DayTransformer extends Fractal\TransformerAbstract
{
    protected $defaultIncludes = [
        'activities'
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
    public function includeActivities(Day $day)
    {
        $activities = $day->activities;

        return $this->collection($activities, new ActivityTransformer);
    }
}
