<?php

use Alexei4er\EventTicketStore\Models\Event;
use Illuminate\Database\Seeder;

class EventTicketStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = Event::updateOrCreate([
            'slug' => 'awesome-event',
        ], [
            'title' => 'Awesome Event',
        ]);

        if ($event->tickets->count() == 0) {
            $event->tickets()->createMany([
                [
                    'title' => 'Awesome Ticket 1',
                    'description' => 'Some description',
                    'price' => 10000,
                ],
                [
                    'title' => 'Awesome Ticket 2',
                    'description' => 'Some description',
                    'price' => 20000,
                ],
                [
                    'title' => 'Awesome Ticket 3',
                    'description' => 'Some description',
                    'price' => 30000,
                ],
            ]);
        }
    }
}
