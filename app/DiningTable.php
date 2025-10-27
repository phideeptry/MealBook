<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiningTable extends Model
{
    protected $fillable = [
        'number', 'seats', 'location', 'status'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
