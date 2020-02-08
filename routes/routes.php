<?php

use Alexei4er\EventTicketStore\Http\Controllers\TicketsController;

Route::middleware(['web'])->group(function () {
    Route::get(
        config("event-ticket-store.tickets_url"),
        TicketsController::class . "@index"
    )->name("ets.tickets.index");

    Route::post(
        config("event-ticket-store.tickets_url"),
        TicketsController::class . "@store"
    )->name("ets.tickets.store");

    Route::any(
        config("event-ticket-store.robokassa_url"),
        TicketsController::class . "@payment"
    )->name("ets.tickets.payment");
});
