<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Pianist;

class PianistsTest extends TestCase
{
    /**
     * @group getDays
     *
     */
    public function testPianistsExists()
    {
        $this->assertNotEmpty(Pianist::all());
    }
}
