<?php

namespace App\Actions\Event;

use App\Models\Event;

class DeleteEventAction
{
    public function __invoke(Event $event)
    {
        return $event->delete();
    }
}
