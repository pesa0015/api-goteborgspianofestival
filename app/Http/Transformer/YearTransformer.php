<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Year;

class YearTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'days', 'locations'
    ];

    public function transform(Year $year)
    {
        return [
            'year'  => $year->year,
            'from'  => $year->days->min('date'),
            'to'    => $year->days->max('date'),
            'month' => \App\Day::MONTH
        ];
    }

    /**
     * Include days
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeDays(Year $year)
    {
        $days = $year->days;

        return $this->collection($days, new DayTransformer);
    }

    /**
     * Include locations
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeLocations(Year $year)
    {
        $locations = !$year->locations->isEmpty()
        ? $year->locations
        : $year->findOrFail($year->id - 1)->locations()->get();

        return $this->collection($locations, new LocationTransformer);
    }
}
