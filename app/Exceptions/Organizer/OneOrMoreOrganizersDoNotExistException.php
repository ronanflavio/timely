<?php

namespace App\Exceptions\Organizer;

use Exception;

class OneOrMoreOrganizersDoNotExistException extends Exception
{
    public function render()
    {
        return response()->json(
            'One or more organizers informed do not exist in database.',
            400
        );
    }
}
