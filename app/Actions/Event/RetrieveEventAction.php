<?php

namespace App\Actions\Event;

use App\Models\Event;

class RetrieveEventAction
{
    public function __invoke(int $id)
    {
        return Event::findOrFail($id);
    }
}
