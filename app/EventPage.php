<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPage extends BaseModel
{
    protected $fillable = [
        'title', 'description', 'slug', 'img', 'year_id'
    ];

    public static function getTransformer()
    {
        return new \App\Http\Transformer\EventPageTransformer;
    }

    public function year()
    {
        return $this->belongsTo('App\Year');
    }

    public function pianists()
    {
        return $this->belongsToMany('App\Pianist');
    }

    public function translations()
    {
        return $this->morphMany('App\Translateable', 'translateable');
    }
}
