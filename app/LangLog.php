<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LangLog extends Model
{
    protected $fillable = ['lang', 'http_accept_lang'];
}
