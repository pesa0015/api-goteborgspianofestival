<?php

namespace App\Http\Controllers;

use App\BoardMember;

class BoardMembersController extends CustomController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach (BoardMember::ROLES as $role) {
            $membersRaw[$role] = collect([]);
        }
        
        BoardMember::all()->filter(function ($member, $key) use ($membersRaw) {
            switch ($member->role) {
                case BoardMember::LEADER:
                    $membersRaw['leaders']->push($member);
                    break;
                case BoardMember::MEMBER:
                    $membersRaw['members']->push($member);
                    break;
                case BoardMember::SUBSTRITUTE:
                    $membersRaw['substitutes']->push($member);
                    break;
                default:
                    break;
            }
        });

        foreach ($membersRaw as $key => $collection) {
            $members[$key] = $this->transform->collection($membersRaw[$key], BoardMember::getTransformer($key));
        }

        return response()->json($members, 200);
    }
}
