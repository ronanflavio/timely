<?php

namespace App\Actions\Event;

use App\DataTransferObjects\Event\SaveEventData;
use App\Exceptions\Organizer\OneOrMoreOrganizersDoNotExistException;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Support\Facades\DB;

class SaveEventAction
{
    public function __invoke(SaveEventData $data, Event $event = null): int
    {
        DB::beginTransaction();

        try {
            $event = $event ? $event : new Event();
            $event->title = $data->title;
            $event->description = $data->description;
            $event->start_datetime = $data->start_datetime;
            $event->end_datetime = $data->end_datetime;
            $event->save();

            $this->syncOrganizers($event, $data->organizers);
            DB::commit();
            return $event->id;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    private function syncOrganizers(Event $event, array $organizers): void
    {
        if (!$this->organizersExist($organizers)) {
            throw new OneOrMoreOrganizersDoNotExistException();
        }
        $event->organizers()->sync($organizers);
    }

    private function organizersExist(array $organizers)
    {
        $organizersCollection = Organizer::find($organizers);
        return $organizersCollection->count() === sizeof($organizers);
    }
}
