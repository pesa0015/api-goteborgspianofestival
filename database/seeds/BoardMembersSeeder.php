<?php

use App\BoardMember;

class BoardMembersSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = $this->getData('board_members.json');

        $this->seedMembers($members);
    }

    private function seedMembers($members)
    {
        foreach ($members as $member) {
            BoardMember::create((array)$member);
        }
    }
}
