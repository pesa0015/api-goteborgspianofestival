<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    const MONTH = 'Augusti';
    
    protected $fillable = [
        'date', 'week_day', 'year_id'
    ];

    public static function getTransformer()
    {
        return new \App\Http\Transformer\DayTransformer;
    }

    public function year()
    {
        return $this->belongsTo('App\Year');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
