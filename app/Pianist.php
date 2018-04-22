<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pianist extends Model
{
    protected $fillable = [
        'name', 'bio', 'img'
    ];

    public function translations()
    {
        return $this->morphMany('App\Translateable', 'translateable');
    }
}
