<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Order;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $data['total'] = Order::getIncoming();
        $types = RoomType::lists('name', 'id');
        $rooms = Room::lists('no', 'id');

        return view('admin.index', compact('data', 'types', 'rooms'));
    }

    public function search(Request $request)
    {
        if ($request->has('room_type') && ($room_type = $request->get('room_type')) !== '') {
            $orders = Order::with(['room' => function($query) use ($room_type) {
                return $query->whereHas('type', function($query) use ($room_type) {
                    return $query->where('id', $room_type);
                });
            }])->get()->filter(function($order) {
                return $order->room !== null;
            });
        }

        if ($request->has('room_no') && ($room_no = $request->get('room_no')) !== '') {
            $orders = Order::with(['room' => function($query) use ($room_no) {
                return $query->where('no', $room_no);
            }])->get()->filter(function($order) {
                return $order->room !== null;
            });
        }

        if ($request->has('date') && ($date = $request->get('date')) !== '') {
            $orders = Order::with('room')
                        ->where('check_in_at', $date)
                        ->get();
        }

        if ($request->has('check_in_at') || $request->has('check_out_at')) {
            $query = Order::with('room');

            if (($check_in_at = $request->get('check_in_at')) !== '') {
                $query->where('check_in_at', '>=', $check_in_at);
            }

            if (($check_out_at = $request->get('check_out_at')) !== '') {
                $query->where('check_out_at', '<=', $check_out_at);
            }

            $orders = $query->get();
        }

        return view('admin.result', compact('orders'));
    }
}
