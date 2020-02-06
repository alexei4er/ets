<?php

namespace Alexei4er\EventTicketStore\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
