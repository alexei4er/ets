<?php

namespace Alexei4er\EventTicketStore;

use Alexei4er\EventTicketStore\Console\Commands\PackageInstall;
use Alexei4er\EventTicketStore\Console\Commands\PackageUninstall;
use Illuminate\Foundation\AliasLoader;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const VIEWS_PATH = __DIR__ . '/../resources/views';
    const ROUTES_PATH = __DIR__ . '/../routes/routes.php';
    const CONFIG_PATH = __DIR__ . '/../config/event-ticket-store.php';
    const MIGRATIONS_PATH =  __DIR__ . '/../database/migrations';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('event-ticket-store.php'),
        ], 'ets_config');

        $this->publishes([
            self::VIEWS_PATH => resource_path('views/vendor/ets_views'),
        ], 'ets_views');

        $this->loadViewsFrom(self::VIEWS_PATH, 'ets_views');
        $this->loadRoutesFrom(self::ROUTES_PATH);
        $this->loadMigrationsFrom(self::MIGRATIONS_PATH);

        $this->registerSeeds();
        $this->registerCommands();
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

        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('EventTicketStore', EventTicketStore::class);
        });
    }

    /**
     * Include seed files
     *
     * @return void
     */
    protected function registerSeeds()
    {
        if ($this->app->runningInConsole()) {
            include(__DIR__ . '/../database/seeds/EventTicketStoreSeeder.php');
        }
    }

    /**
     * Register artisan commands
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PackageInstall::class,
                PackageUninstall::class,
            ]);
        }
    }
}
