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
            '/api/events/' . $id,
        );

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenIdDoesNotExists()
    {
        $id = 10;

        $response = $this->json(
            'GET',
            '/api/events/' . $id,
        );

        $response->assertStatus(404);
    }
}
