<?php

namespace App\Http\Controllers;

use App\Actions\Event\CreateEventAction;
use App\Actions\Event\RetrieveEventAction;
use App\Actions\Event\UpdateEventAction;
use App\DataTransferObjects\Event\CreateEventData;
use App\DataTransferObjects\Event\UpdateEventData;
use App\Http\Requests\Event\CreateEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Models\Event;

class EventsController extends Controller
{
    public function create(CreateEventRequest $request, CreateEventAction $action)
    {
        $data = CreateEventData::fromRequest($request);
        $response = $action($data);
        return response()->json($response, 201);
    }

    public function retrieve(RetrieveEventAction $action, int $id)
    {
        $response = $action($id);
        return response()->json($response);
    }

    public function update(UpdateEventRequest $request, UpdateEventAction $action, Event $event)
    {
        $data = UpdateEventData::fromRequest($request);
        $response = $action($event, $data);
        return response()->json($response, 201);
    }

    public function delete()
    {
        //
    }
}
