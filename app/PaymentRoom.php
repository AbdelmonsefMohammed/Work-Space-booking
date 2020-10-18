<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRoom extends Model
{
    protected $table = 'payment_room';

    protected $fillable = ['payment_id', 'room_id'];
}
