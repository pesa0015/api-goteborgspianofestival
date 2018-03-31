<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Translate
     *
     * @return string
     */
    public function t($key)
    {
        $translation = $this->translations->where('key', $key)->first();

        return $translation ? $translation->translation : $this->$key;
    }
}
