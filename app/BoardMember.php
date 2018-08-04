<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    const LEADER      = 1;
    const MEMBER      = 2;
    const SUBSTRITUTE = 3;

    const ROLES = [
        'leaders', 'members', 'substitutes'
    ];

    protected $fillable = [
        'name', 'role'
    ];

    public static function getTransformer()
    {
        return new \App\Http\Transformer\BoardMembersTransformer;
    }
}
