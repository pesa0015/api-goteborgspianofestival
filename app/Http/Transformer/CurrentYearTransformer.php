<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Year;
use Carbon\Carbon;

class CurrentYearTransformer extends YearTransformer
{
    protected $defaultIncludes = [
        'locations'
    ];

    public function transform(Year $year)
    {
        $today  = Carbon::now();
        $starts = Carbon::parse($today->format('Y') . '-08-' . $year->days->min('date'));

        $daysDiff = $starts->diffInDays($today);

        return [
            'year'      => $year->year,
            'from'      => $year->days->min('date'),
            'to'        => $year->days->max('date'),
            'countdown' => $daysDiff,
            'month'     => \App\Day::MONTH
        ];
    }
}
