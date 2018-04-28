<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPagePianist extends Model
{
    public $table = 'event_page_pianist';
    
    protected $fillable = [
        'event_page_id',
        'pianist_id',
        'bio',
        'img'
    ];

    public function eventPage()
    {
        return $this->belongsTo('App\EventPage');
    }

    public function pianist()
    {
        return $this->belongsTo('App\Pianist');
    }
}
