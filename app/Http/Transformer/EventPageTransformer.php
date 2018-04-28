<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\EventPage;

class EventPageTransformer extends Fractal\TransformerAbstract
{
    protected $defaultIncludes = [
        'pianists'
    ];

    public function transform(EventPage $eventPage)
    {
        return [
            'title'       => $eventPage->t('title'),
            'description' => $eventPage->t('description'),
            'img'         => $eventPage->img,
        ];
    }

    /**
     * Include pianists
     *
     * @return League\Fractal\CollectionResource
     */
    public function includePianists(EventPage $eventPage)
    {
        $pianists = $eventPage->pianists;

        return $this->collection($pianists, new PianistTransformer);
    }
}
