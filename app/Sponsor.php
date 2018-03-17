<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'name',
        'img',
        'link',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public static function getTransformer()
    {
        return new \App\Http\Transformer\SponsorTransformer;
    }
}
