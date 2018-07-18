<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'room_no',
        'phone',
        'name',
        'check_in_at',
        'check_out_at',
        'status'
    ];

    protected $dates = ['check_in_at', 'check_out_at'];

    protected $casts = [
        'phone' => 'int'
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_no', 'no');
    }

    public static function getIncoming($orders = null)
    {
        $orders = $orders ?: self::with('room')->get();

        return $orders->reduce(function ($incoming, $order) {
            return $incoming += $order->room->price * $order->getStayDays();
        }, 0);
    }

    public function getStayDays()
    {
        return $this->check_in_at->diffInDays($this->check_out_at);
    }
}
