<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'year', 'active'
    ];

    public function days()
    {
        return $this->hasMany('App\Day');
    }
}
