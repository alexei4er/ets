<?php

namespace Alexei4er\EventTicketStore\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class PackageUninstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ets:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $migrationsPath = __DIR__ . '/../../../database/migrations/';
        foreach (scandir($migrationsPath) as $file) {
            $info = pathinfo($migrationsPath . $file);
            \DB::delete("DELETE FROM migrations WHERE migration = '{$info['filename']}'");
        }

        Schema::dropIfExists('orders');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('events');
    }
}
