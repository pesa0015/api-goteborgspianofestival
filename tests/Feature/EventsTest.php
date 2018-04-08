<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Event;

class EventsTest extends TestCase
{
    /**
     * @group getDays
     *
     */
    public function testEventsHasTranslations()
    {
        $activity = Event::where('name', 'Mästarklass')->first();

        $this->assertDatabaseHas('translateables', [
            'translateable_id'   => $activity->id,
            'translateable_type' => get_class($activity)
        ]);

        $response = $this->get('/years');

        $response->assertStatus(200);

        // Assert swedish
        $response->assertJsonFragment([
            'name' => 'Mästarklass'
        ]);

        $response = $this->call('GET', '/years', [], [], [], ['HTTP_LOCALE' => 'en']);

        $response->assertStatus(200);

        // Assert english
        $response->assertJsonFragment([
            'name' => 'Masterclass'
        ]);

        $response = $this->get('/years');

        $response->assertStatus(200);

        // Assert swedish
        $response->assertJsonFragment([
            'name' => 'Mästarklass'
        ]);

        $response = $this->call('GET', '/years', [], [], [], ['HTTP_LOCALE' => 'en']);

        $response->assertStatus(200);

        // Assert english
        $response->assertJsonFragment([
            'name' => 'Masterclass'
        ]);
    }
}
