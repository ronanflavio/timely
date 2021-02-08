<?php

namespace App\Actions\Event;

use App\Models\Event;

class RetrieveEventAction
{
    public function __invoke(int $id = null)
    {
        if (!empty($id)) {
            return Event::with('organizers')->findOrFail($id);
        }
        return Event::with('organizers')->get();
    }
}
