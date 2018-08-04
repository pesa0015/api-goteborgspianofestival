<?php

namespace App\Http\Transformer;

use League\Fractal;
use App\BoardMember;

class BoardMembersTransformer extends Fractal\TransformerAbstract
{
    public function transform(BoardMember $member)
    {
        return [
            'name' => $member->name
        ];
    }
}
