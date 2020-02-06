<?php

namespace Alexei4er\EventTicketStore\Facades;

use Illuminate\Support\Facades\Facade;

class EventTicketStore extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'event-ticket-store';
    }
}
