<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationYear extends Model
{
    protected $fillable = [
        'year_id', 'location_id'
    ];

    public function year()
    {
        return $this->belongsTo('App\Year');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
