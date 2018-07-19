<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'no',
        'room_type_id',
        'price',
        'discount',
        'image',
        'status',
        'info',
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'room_no', 'no');
    }
}
