<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\News;
use Carbon\Carbon;

class NewsTransformer extends Fractal\TransformerAbstract
{
    public function transform(News $news)
    {
        return [
            'title'  => $news->t('title'),
            'slug'   => $news->slug,
            'banner' => $news->banner,
            'post'   => $news->t('post'),
            'createdAt' => $news->translateMonthInDate('created_at'),
            'updatedAt' => $news->translateMonthInDate('updated_at'),
        ];
    }
}
