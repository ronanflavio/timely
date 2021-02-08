<?php

namespace App\Http\Controllers;

use App\Actions\Event\CreateEventAction;
use App\DataTransferObjects\Event\CreateEventData;
use App\Http\Requests\Event\CreateEventRequest;

class EventsController extends Controller
{
    public function create(CreateEventRequest $request, CreateEventAction $action)
    {
        $data = CreateEventData::fromRequest($request);
        $response = $action($data);
        return response()->json($response, 201);
    }

    public function retrieve()
    {
        //
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }
}
