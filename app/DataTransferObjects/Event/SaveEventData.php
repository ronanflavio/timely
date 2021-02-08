<?php

namespace App\DataTransferObjects\Event;

use App\Http\Requests\Event\SaveEventRequest;
use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class SaveEventData extends DataTransferObject
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

    public static function fromRequest(SaveEventRequest $request)
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
