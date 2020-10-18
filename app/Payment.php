<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;
use Carbon\Carbon;

class Payment extends Model
{
    protected $with = ['user','rooms'];

    protected $fillable = [
        'user_id',
        'payment_amount',
        'payment_tax',
        'payment_discount',
        'payment_discount_code',
        'payment_total',
        'payment_method',

    ];

    public function rooms()
    {
        return $this->belongsToMany('App\Room');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d' . ' ' . 'H:i') : null;

    }

}
