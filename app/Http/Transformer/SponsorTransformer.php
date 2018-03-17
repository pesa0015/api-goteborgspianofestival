<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\Sponsor;

class SponsorTransformer extends Fractal\TransformerAbstract
{
    public function transform(Sponsor $sponsor)
    {
        return [
            'name' => $sponsor->name,
            'slug' => $sponsor->slug,
            'img'  => $sponsor->img,
            'link' => $sponsor->link
        ];
    }
}
