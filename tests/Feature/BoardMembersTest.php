<?php

namespace Tests\Feature;

use Tests\TestCase;

class BoardMembersTest extends TestCase
{
    /**
     * @group getBoardMembers
     *
     */
    public function testGetBoardMembers()
    {
        $response = $this->get('/boardmembers');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'leaders' => [
                '*' => [
                    'name'
                ]
            ],
            'members' => [
                '*' => [
                    'name'
                ]
            ],
            'substitutes' => [
                '*' => [
                    'name'
                ]
            ]
        ]);
    }
}
