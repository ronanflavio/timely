<?php

namespace App\Actions\Event;

use App\DataTransferObjects\Event\UpdateEventData;
use App\Models\Event;

class UpdateEventAction
{
    public function __invoke(Event $event, UpdateEventData $data)
    {
        $event->title = $data->title;
        $event->description = $data->description;
        $event->start_datetime = $data->start_datetime;
        $event->end_datetime = $data->end_datetime;
        $event->save();

        $this->syncOrganizers($event, $data->organizers);

        return $event->id;
    }

    private function syncOrganizers(Event $event, array $organizers)
    {
        $event->organizers()->sync($organizers);
    }
}
