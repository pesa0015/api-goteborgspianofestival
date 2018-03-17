<?php

namespace Tests\Feature;

use Tests\TestCase;

class SponsorsTest extends TestCase
{
    /**
     * @group getSponsors
     *
     */
    public function testGetSponsors()
    {
        $response = $this->get('/sponsors');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'name',
                'slug',
                'img',
                'link'
            ]
        ]);
    }
}
