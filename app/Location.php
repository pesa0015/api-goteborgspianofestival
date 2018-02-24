<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name', 'img', 'show'
    ];

    public function activities()
    {
        return $this->hasMany('App\Activity');
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
