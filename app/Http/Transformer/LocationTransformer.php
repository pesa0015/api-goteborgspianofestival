<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Location;

class LocationTransformer extends Fractal\TransformerAbstract
{
    public function transform(Location $location)
    {
        return [
            'name' => $location->name,
            'img'  => $location->img
        ];
    }
}
