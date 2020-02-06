<?php

namespace Alexei4er\EventTicketStore\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [
        'ticket_id',
        'paid',
    ];

    protected $casts = [
        'paid' => 'boolean',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
