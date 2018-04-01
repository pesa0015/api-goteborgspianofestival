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
        $response->assertJsonFragment([
            'name' => 'Mästarklass'
        ]);

        \App::setLocale('en');

        $response = $this->get('/years');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => 'Masterclass'
        ]);
    }
}
