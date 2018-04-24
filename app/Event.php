<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends BaseModel
{
    protected $fillable = [
        'start',
        'end',
        'name',
        'description',
        'pianist_id',
        'event_page_id',
        'location_id',
        'room_id',
        'day_id'
    ];

    public function eventPage()
    {
        return $this->belongsTo('App\EventPage');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function day()
    {
        return $this->belongsTo('App\Day');
    }

    public function pianist()
    {
        return $this->belongsTo('App\Pianist');
    }

    public function translations()
    {
        return $this->morphMany('App\Translateable', 'translateable');
    }
}
