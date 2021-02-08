<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $casts = [
        'start_datetime' => 'datetime:Y-m-d H:i:s',
        'end_datetime' => 'datetime:Y-m-d H:i:s',
    ];

    public function organizers()
    {
        return $this->hasMany(
            Organizer::class,
            'event_id',
            'id'
        );
    }
}
