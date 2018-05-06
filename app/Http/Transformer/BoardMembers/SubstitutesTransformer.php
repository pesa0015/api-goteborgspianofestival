<?php

namespace App\Http\Transformer\BoardMembers;

use League\Fractal;
use App\BoardMember;

class SubstitutesTransformer extends Fractal\TransformerAbstract
{
    public function transform(BoardMember $member)
    {
        return [
            'name' => $member->name
        ];
    }
}
