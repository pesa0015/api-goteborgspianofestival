<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Activity;

class ActivitiesTest extends TestCase
{
    /**
     * @group getDays
     *
     */
    public function testActivitiesHasTranslations()
    {
        $activity = Activity::where('name', 'Mästarklass')->first();

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
        $response->assertCookieMissing('locale');

        $response = $this->call('GET', '/years', [], ['locale' => 'en']);

        $response->assertStatus(200);

        // Assert english
        $response->assertJsonFragment([
            'name' => 'Masterclass'
        ]);
        $response->assertCookie('locale');

        $response = $this->get('/years');

        $response->assertStatus(200);

        // Assert swedish
        $response->assertJsonFragment([
            'name' => 'Mästarklass'
        ]);

        $response = $this->get('/years?locale=en');

        $response->assertStatus(200);

        // Assert english
        $response->assertJsonFragment([
            'name' => 'Masterclass'
        ]);
    }
}
