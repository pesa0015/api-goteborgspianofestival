<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Year;

class YearTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'days'
    ];

    public function transform(Year $year)
    {
        return [
            'year'  => $year->year
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
}
