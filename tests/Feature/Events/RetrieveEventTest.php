<?php

namespace Tests\Feature\Events;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RetrieveEventTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        Event::factory()->create();
    }

    /**
     * @test
     */
    public function shouldRetrieveEventWhenIdExists()
    {
        $id = 1;

        $response = $this->json(
            'GET',
            '/api/events/' . $id . '/retrieve',
        );

        $response->assertStatus(200);
    }
}
