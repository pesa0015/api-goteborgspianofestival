<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\News;

class NewsTest extends TestCase
{
    /**
     * @group getNews
     *
     */
    public function testNewsHasTranslations()
    {
        $eventPage = News::where('title', 'Bästa Musik-vänner och alla intresserade!')->first();

        $this->assertDatabaseHas('translateables', [
            'translateable_id'   => $eventPage->id,
            'translateable_type' => get_class($eventPage)
        ]);

        $response = $this->get('/news');

        $response->assertStatus(200);

        // Assert swedish
        $response->assertJsonFragment([
            'title' => 'Bästa Musik-vänner och alla intresserade!'
        ]);

        $response = $this->call('GET', '/news', [], [], [], ['HTTP_LOCALE' => 'en']);

        $response->assertStatus(200);

        // Assert english
        $response->assertJsonFragment([
            'title' => 'Greetings & welcome to our music festival!'
        ]);

        $response->assertJsonStructure([
            '*' => [
                'title',
                'slug',
                'banner',
                'post',
            ]
        ]);
    }
}
