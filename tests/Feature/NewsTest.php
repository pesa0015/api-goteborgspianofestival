<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\News;
use Carbon\Carbon;

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

        $newsItemCreatedInJanuary = News::where('created_at', 'LIKE', '%-01-%')->first();

        $day  = Carbon::parse($newsItemCreatedInJanuary->created_at)->format('d');
        $year = Carbon::parse($newsItemCreatedInJanuary->created_at)->format('Y');

        // Assert month in timestamp is translated
        $response->assertJsonFragment([
            'createdAt' => $day . ' Januari, ' . $year
        ]);

        $response = $this->call('GET', '/news', [], [], [], ['HTTP_LOCALE' => 'en']);

        $response->assertStatus(200);

        // Assert english
        $response->assertJsonFragment([
            'title' => 'Greetings & welcome to our music festival!'
        ]);

        // Assert month in timestamp is translated
        $response->assertJsonFragment([
            'createdAt' => $day . ' January, ' . $year
        ]);

        $response->assertJsonStructure([
            '*' => [
                'title',
                'slug',
                'banner',
                'post',
                'createdAt',
                'updatedAt',
            ]
        ]);
    }
}
