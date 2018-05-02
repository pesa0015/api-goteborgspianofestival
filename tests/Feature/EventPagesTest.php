<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\EventPage;

class EventPagesTest extends TestCase
{
    /**
     * @group getDays
     *
     */
    public function testEventPagesHasTranslations()
    {
        $eventPage = EventPage::where('title', 'Mästarklasser')->first();

        $this->assertDatabaseHas('translateables', [
            'translateable_id'   => $eventPage->id,
            'translateable_type' => get_class($eventPage)
        ]);

        $endpoint = '/program/' . $eventPage->year->year . '/' . $eventPage->slug;

        $response = $this->get($endpoint);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'title',
            'slug',
            'description',
            'img',
            'year',
        ]);

        // Assert swedish
        $response->assertJsonFragment([
            'title' => 'Mästarklasser'
        ]);

        $response = $this->call('GET', $endpoint, [], [], [], ['HTTP_LOCALE' => 'en']);

        $response->assertStatus(200);

        // Assert english
        $response->assertJsonFragment([
            'title' => 'Masterclasses'
        ]);
    }

    /**
     * @group showEventPage
     *
     */
    public function testShowEventPage()
    {
        $eventPage = EventPage::whereHas('pianists')->inRandomOrder()->first();

        $response = $this->get('/program/' . $eventPage->year->year . '/' . $eventPage->slug);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'title',
            'slug',
            'description',
            'img',
            'year',
            'pianists' => [
                'data' => [
                    '*' => [
                        'name',
                        'bio',
                        'img',
                    ]
                ]
            ]
        ]);
    }
}
