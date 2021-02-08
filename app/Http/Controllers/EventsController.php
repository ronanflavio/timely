<?php

namespace App\Http\Controllers;

use App\Actions\Event\SaveEventAction;
use App\Actions\Event\DeleteEventAction;
use App\Actions\Event\RetrieveEventAction;
use App\DataTransferObjects\Event\SaveEventData;
use App\Http\Requests\Event\SaveEventRequest;
use App\Models\Event;

class EventsController extends Controller
{
    public function create(SaveEventRequest $request, SaveEventAction $action)
    {
        $data = SaveEventData::fromRequest($request);
        $response = $action($data);
        return response()->json($response, 201);
    }

    public function list(RetrieveEventAction $action)
    {
        $response = $action();
        return response()->json($response);
    }

    public function retrieve(RetrieveEventAction $action, int $id)
    {
        $response = $action($id);
        return response()->json($response);
    }

    public function update(SaveEventRequest $request, SaveEventAction $action, Event $event)
    {
        $data = SaveEventData::fromRequest($request);
        $response = $action($data, $event);
        return response()->json($response, 201);
    }

    public function delete(DeleteEventAction $action, Event $event)
    {
        $response = $action($event);
        return response()->json($response, 201);
    }
}
