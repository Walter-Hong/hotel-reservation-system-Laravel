<?php

use App\Models\Order;

function getIncoming($orders) {
    return Order::getIncoming($orders);
}

function isActive($uri) {
    return strpos(URL::current(), url($uri)) === false ? '' : 'active';
}

function displayPhone($phone) {
    return substr($phone, 0, 3) . '***' . substr($phone, -4);
}
