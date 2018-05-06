<?php

namespace App\Http\Transformer\BoardMembers;

use League\Fractal;
use App\BoardMember;

class MembersTransformer extends Fractal\TransformerAbstract
{
    public function transform(BoardMember $member)
    {
        return [
            'name' => $member->name
        ];
    }
}
