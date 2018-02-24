<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DaysTest extends TestCase
{
    /**
     * @group getDays
     *
     */
    public function testGetDays()
    {
        $response = $this->get('/days');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'year',
                'days' => [
                    'data' => [
                        '*' => [
                            'date',
                            'month',
                            'activities' => [
                                'data' => [
                                    '*' => [
                                        'start',
                                        'end',
                                        'name',
                                        'description',
                                        'location',
                                        'room'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
}
