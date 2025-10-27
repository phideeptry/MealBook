<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'role', 'hired_at', 'is_active'
    ];

    protected $casts = [
        'hired_at' => 'date'
    ];
}
