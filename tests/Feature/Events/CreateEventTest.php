<?php

namespace Tests\Feature\Events;

use App\Models\Organizer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateEventTest extends TestCase
{
    use RefreshDatabase;

    private $eventData;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        Organizer::factory()->count(3)->create();
    }

    /**
     * @test
     */
    public function shouldCreateNewEventWhenDataIsValid(): void
    {
        $this->withoutExceptionHandling();

        $data = [
            'title' => 'Title of the event',
            'description' => 'Long description goes here.',
            'start_datetime' => '2021-12-25 18:00:00',
            'end_datetime' => '2021-12-25 23:59:59',
            'organizers' => [1,2,3],
        ];

        $response = $this->json(
            'POST',
            '/api/events',
            $data
        );

        $response->assertStatus(201);
    }
}
