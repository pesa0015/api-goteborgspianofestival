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
                'year',
                'days' => [
                    'data' => [
                        '*' => [
                            'date',
                            'month',
                            'events' => [
                                'data' => [
                                    '*' => [
                                        'start',
                                        'end',
                                        'name',
                                        'description',
                                        'pianist',
                                        'eventPage',
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

        $response->assertJsonFragment([
            'year' => '2016'
        ]);

        $response->assertJsonFragment([
            'year' => '2017'
        ]);

        $response->assertJsonFragment([
            'year' => '2018'
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
                        'img',
                        'lat',
                        'lng',
                    ]
                ]
            ]
        ]);
        $this->assertInternalType('int', $response->getData()->countdown);

        $this->assertEquals(\App\LangLog::where('lang', 'sv')->count(), 1);

        $response = $this->call('GET', '/years/current', [], [], [], ['HTTP_LOCALE' => 'en']);

        $this->assertEquals(\App\LangLog::where('lang', 'en')->count(), 1);
    }
}
