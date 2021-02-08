<?php

namespace App\Actions\Event;

use App\DataTransferObjects\Event\CreateEventData;
use App\Models\Event;

class CreateEventAction
{
    public function __invoke(CreateEventData $data): int
    {
        $event = new Event();
        $event->title = $data->title;
        $event->description = $data->description;
        $event->start_datetime = $data->start_datetime;
        $event->end_datetime = $data->end_datetime;
        $event->save();

        $this->attachOrganizers($event, $data->organizers);

        return $event->id;
    }

    private function attachOrganizers(Event $event, array $organizers): void
    {
        $event->organizers()->attach($organizers);
    }
}
