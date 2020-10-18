<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'capacity',
        'hourly_rate',
        'over_capacity',
        'extra_price',
        'description',
        'created_at',
        'updated_at',

    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
