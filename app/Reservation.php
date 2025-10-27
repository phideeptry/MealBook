<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'customer_name', 'customer_phone', 'reservation_time', 'party_size', 'dining_table_id', 'status', 'notes'
    ];

    protected $casts = [
        'reservation_time' => 'datetime'
    ];

    public function diningTable()
    {
        return $this->belongsTo(DiningTable::class);
    }
}
