<?php

namespace Alexei4er\EventTicketStore\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    const PERSON_TYPE = 'person';
    const ORGANIZATION_TYPE = 'organization';

    const CUSTOMER_TYPES = [
        self::PERSON_TYPE => 'Person',
        self::ORGANIZATION_TYPE => 'Organization',
    ];

    protected $guarded = [
        'ticket_id',
        'paid',
    ];

    protected $casts = [
        'amount' => 'integer',
        'paid' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        Order::creating(function ($model) {
            $model->filename = md5(uniqid());
        });
    }

    /**
     * Name of ticket for the bill
     *
     * @return string
     */
    public function getServiceNameAttribute(): string
    {
        return "{$this->ticket->title} to {$this->ticket->event->title}";
    }

    /**
     * Path to pdf
     *
     * @return string
     */
    public function getBillPathAttribute(): string
    {
        return "{$this->ticket->event->slug}/{$this->filename}.pdf";
    }

    /**
     * Order ticket
     *
     * @return BelongsTo
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
