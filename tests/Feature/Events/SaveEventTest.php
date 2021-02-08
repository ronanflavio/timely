<?php

namespace Tests\Feature\Events;

use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SaveEventTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        Organizer::factory()->count(3)->create();
    }

    public function dataProvider()
    {
        return [
            'title' => 'Title of the event',
            'description' => 'Long description goes here.',
            'start_datetime' => '2021-12-25 18:00:00',
            'end_datetime' => '2021-12-25 23:59:59',
            'organizers' => [1,2,3],
        ];
    }

    /**
     * @test
     */
    public function shouldCreateNewEventWhenDataIsValid(): void
    {
        $response = $this->json(
            'POST',
            '/api/events',
            $this->dataProvider()
        );

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function shouldUpdateEventWhenDataIsValid()
    {
        $event = Event::factory()->create();

        $response = $this->json(
            'PUT',
            '/api/events/' . $event->id,
            $this->dataProvider()
        );

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function shouldNotSaveEventWhenOrganizersDoNotExist(): void
    {
        $data = $this->dataProvider();
        $data['organizers'] = [1,2,3,4];

        $response = $this->json(
            'POST',
            '/api/events',
            $data
        );

        $response->assertStatus(400);
    }

    public function shouldThrowExceptionWhenUpdatingWithInvalidId()
    {
        $invalidId = 100;

        $response = $this->json(
            'PUT',
            '/api/events/' . $invalidId,
            $this->dataProvider()
        );

        $response->assertStatus(404);
    }

}
