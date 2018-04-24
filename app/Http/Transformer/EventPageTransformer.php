<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\EventPage;

class EventPageTransformer extends Fractal\TransformerAbstract
{
    public function transform(EventPage $eventPage)
    {
        return [
            'title'       => $eventPage->t('title'),
            'description' => $eventPage->t('description'),
            'img'         => $eventPage->img,
        ];
    }
}
