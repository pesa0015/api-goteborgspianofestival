<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name', 'img', 'show', 'lat', 'lng'
    ];

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function years()
    {
        return $this->belongsToMany('App\Year')->withTimestamps();
    }
}
