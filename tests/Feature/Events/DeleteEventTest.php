<?php

namespace Tests\Feature\Events;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteEventTest extends TestCase
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
    public function shouldDeleteEventWhenIdExistis()
    {
        $id = 1;

        $response = $this->json(
            'DELETE',
            '/api/events/' . $id,
        );

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenIdDoesNotExists()
    {
        $id = 10;

        $response = $this->json(
            'DELETE',
            '/api/events/' . $id,
        );

        $response->assertStatus(404);
    }
}
