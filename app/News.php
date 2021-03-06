<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends BaseModel
{
    protected $fillable = [
        'title',
        'slug',
        'banner',
        'post',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    public static function getTransformer()
    {
        return new \App\Http\Transformer\NewsTransformer;
    }

    public function translations()
    {
        return $this->morphMany('App\Translateable', 'translateable');
    }

    public static function visible()
    {
        return self::where('visible', true);
    }

    public function translateMonthInDate($field)
    {
        $date = \Carbon\Carbon::parse($this->$field);

        $month = $date->format('F');
        $translatedMonth = trans('months.' . $month);

        return str_replace($month, $translatedMonth, $date->format('j F, Y'));
    }
}
