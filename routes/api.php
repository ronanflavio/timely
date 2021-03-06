<?php

use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

Route::prefix('events')->group(function () {

    Route::post('/', [EventsController::class, 'create']);
    Route::get('/', [EventsController::class, 'list']);
    Route::get('/{id}', [EventsController::class, 'retrieve']);
    Route::put('/{event}', [EventsController::class, 'update']);
    Route::delete('/{event}', [EventsController::class, 'delete']);

});
