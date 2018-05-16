<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    const ADULT     = 1;
    const YOUNG     = 2;
    const VOLUNTEER = 3;

    protected $fillable = [
        'name',
        'age',
        'email',
        'mobile_number',
        'type',
    ];

    private $details = [];

    public function details()
    {
        return $this->morphMany('App\Detail', 'detailable');
    }

    public function populate($attributes)
    {
        foreach ($attributes as $attribute => $value) {
            $field = snake_case($attribute);
            if (in_array($field, $this->getFillable())) {
                $this->$field = $value;
                continue;
            }

            $this->details[$attribute] = $value;
        }

        return $this;
    }

    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    public function save(array $options = array())
    {
        parent::save($options);

        $class = get_class($this);

        foreach ($this->details as $attribute => $value) {
            Detail::create([
                'detailable_id'   => $this->id,
                'detailable_type' => $class,
                'attribute'       => $attribute,
                'value'           => $value,
            ]);
        }
    }
}
