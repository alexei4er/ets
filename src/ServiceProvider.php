<?php

namespace Alexei4er\EventTicketStore;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/event-ticket-store.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('event-ticket-store.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'event-ticket-store'
        );

        $this->app->bind('event-ticket-store', function () {
            return new EventTicketStore();
        });
    }
}
