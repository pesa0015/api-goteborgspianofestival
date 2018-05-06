<?php

namespace App\Http\Transformer\BoardMembers;

use League\Fractal;
use App\BoardMember;

class LeadersTransformer extends Fractal\TransformerAbstract
{
    public function transform(BoardMember $member)
    {
        return [
            'name' => $member->name
        ];
    }
}
