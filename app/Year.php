<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'year', 'active'
    ];

    public static function getTransformer()
    {
        return new \App\Http\Transformer\YearTransformer;
    }

    public static function getIncludes()
    {
        return ['days', 'activities'];
    }

    public function days()
    {
        return $this->hasMany('App\Day');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location')->withTimestamps();
    }

    public static function activeYears()
    {
        return self::where('active', true);
    }
}
