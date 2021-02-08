<?php

namespace App\DataTransferObjects\Event;

use App\Http\Requests\Event\CreateEventRequest;
use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class CreateEventData extends DataTransferObject
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var Carbon\Carbon
     */
    public $start_datetime;

    /**
     * @var Carbon\Carbon
     */
    public $end_datetime;

    /**
     * @var int[]
     */
    public $organizers;

    public static function fromRequest(CreateEventRequest $request)
    {
        return new self([
            'title' => $request->title,
            'description' => $request->description,
            'start_datetime' => Carbon::make($request->start_datetime),
            'end_datetime' => Carbon::make($request->end_datetime),
            'organizers' => $request->organizers,
        ]);
    }
}
