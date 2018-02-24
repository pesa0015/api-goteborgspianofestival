<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class YearsTest extends TestCase
{
    /**
     * @group getYears
     *
     */
    public function testGetYears()
    {
        $response = $this->get('/years');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'year'
            ]
        ]);
    }

    /**
     * @group getCurrentYear
     *
     */
    public function testGetCurrentYear()
    {
        $response = $this->get('/years/current');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'year',
            'from',
            'to',
            'month',
            'locations' => [
                'data' => [
                    '*' => [
                        'name',
                        'img'
                    ]
                ]
            ]
        ]);
    }
}
