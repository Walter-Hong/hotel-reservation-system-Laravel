<?php

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

function getIncoming($orders)
{
    return Order::getIncoming($orders);
}

function isActive($uri)
{
    return strpos(URL::current(), url($uri)) === false ? '' : 'active';
}

function displayPhone($phone)
{
    if (strcmp(Auth::user()->phone, $phone)) {
        return $phone;
    }
    return substr($phone, 0, 3) . '***' . substr($phone, -4);
}
