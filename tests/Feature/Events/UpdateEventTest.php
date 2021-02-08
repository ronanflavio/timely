<?php

namespace Tests\Feature\Events;

use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateEventTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        Event::factory()->create();
        Organizer::factory()->count(2)->create();
    }

    /**
     * @test
     */
    public function shouldUpdateEventWhenDataIsValid()
    {
        $id = 1;

        $data = [
            'title' => 'Title of the event',
            'description' => 'Long description goes here.',
            'start_datetime' => '2021-12-25 18:00:00',
            'end_datetime' => '2021-12-25 23:59:59',
            'organizers' => [1,2],
        ];

        $response = $this->json(
            'PUT',
            '/api/events/' . $id,
            $data
        );

        $response->assertStatus(201);
    }
}
