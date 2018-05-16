<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'detailable_id',
        'detailable_type',
        'attribute',
        'value'
    ];

    public function detailable()
    {
        return $this->morphTo();
    }
}
