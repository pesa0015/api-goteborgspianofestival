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
            'slug' => $pianist->slug,
            'bio'  => $pianist->bio,
            'img'  => $pianist->img,
        ];
    }
}
