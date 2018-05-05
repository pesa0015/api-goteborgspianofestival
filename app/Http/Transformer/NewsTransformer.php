<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\News;

class NewsTransformer extends Fractal\TransformerAbstract
{
    public function transform(News $news)
    {
        return [
            'title'  => $news->t('title'),
            'slug'   => $news->slug,
            'banner' => $news->banner,
            'post'   => $news->t('post'),
        ];
    }
}
