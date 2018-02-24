<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'start',
        'end',
        'name',
        'description',
        'location_id',
        'room_id',
        'day_id'
    ];

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
}