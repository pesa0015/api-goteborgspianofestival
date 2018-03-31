<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translateable extends Model
{
    protected $fillable = [
        'translateable_id',
        'translateable_type',
        'key',
        'language',
        'translation'
    ];

    public function translateable()
    {
        return $this->morphTo();
    }

    public function scopeOfLang($query)
    {
        return $query->where('language', \App::getLocale())->get();
    }
}
