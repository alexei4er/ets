<?php

namespace Alexei4er\EventTicketStore\Tests;

use Alexei4er\EventTicketStore\Facades\EventTicketStore;
use Alexei4er\EventTicketStore\ServiceProvider;
use Orchestra\Testbench\TestCase;

class EventTicketStoreTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'event-ticket-store' => EventTicketStore::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
