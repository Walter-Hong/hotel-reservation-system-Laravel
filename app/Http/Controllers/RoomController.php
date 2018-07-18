<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('type')->paginate(16);

        return view('rooms.index', compact('rooms'));
    }

    public function search(Request $request)
    {
        $query = Room::with('type');

        if ($low = $request->get('low'))
            $query->where('price', '>=', $low);

        if ($high = $request->get('high'))
            $query->where('price', '<=', $high);

        if ($request->has('discount') && ($discount = $request->get('discount')) !== '') {
            $query->where('discount', $discount);
        }

        $rooms = $query->get();

        return view('rooms.search', compact('rooms'));
    }
}
