<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;
use Carbon\Carbon;



class Reservation extends Model
{

    protected $dates = [
        'end_time',
        'start_time',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'title',
        'room_id',
        'user_id',
        'end_time',
        'start_time',

        'description',
    ];


    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function getStartTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d' . ' ' . 'H:i') : null;

    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ? Carbon::createFromFormat('Y-m-d' . ' ' . 'H:i', $value)->format('Y-m-d H:i:s') : null;

    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d' . ' ' . 'H:i') : null;

    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ? Carbon::createFromFormat('Y-m-d' . ' ' . 'H:i', $value)->format('Y-m-d H:i:s') : null;

    }
}
