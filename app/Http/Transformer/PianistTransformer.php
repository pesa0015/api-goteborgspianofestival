<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Pianist;

class PianistTransformer extends Fractal\TransformerAbstract
{
    public function transform(Pianist $pianist)
    {
        return [
            'name' => $pianist->name,
            'bio'  => $pianist->bio,
            'img'  => $pianist->img,
        ];
    }
}
