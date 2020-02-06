<?php

namespace Alexei4er\EventTicketStore\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public function tickets()
    {
        return $this->hasMany('tickets', 'event_id');
    }
}
