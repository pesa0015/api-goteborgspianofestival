<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pianist extends Model
{
    protected $fillable = [
        'name', 'slug', 'bio', 'img'
    ];

    public function eventPage()
    {
        return $this->belongsToMany('App\EventPage');
    }

    public function translations()
    {
        return $this->morphMany('App\Translateable', 'translateable');
    }
}
