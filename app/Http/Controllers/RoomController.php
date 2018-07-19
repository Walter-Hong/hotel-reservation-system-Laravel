<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('type')->where('status', '=', 1)->paginate(16);

        return view('rooms.index', compact('rooms'));
    }

    public function search(Request $request)
    {
        $query = Room::with('type')->where('status', '=', 1);

        if ($low = $request->get('low'))
            $query->where('price', '>=', $low);
        if ($keyword = $request->get('keyword'))
            $query->whereRaw("concat(`price`,`discount`,`no`,`info`) like '%" . $keyword . "%'");

        if ($high = $request->get('high'))
            $query->where('price', '<=', $high);

        if ($request->has('discount') && ($discount = $request->get('discount')) !== '') {
            $query->where('discount', '>=', $discount);
        }
        if ($request->has('orderby') && ($orderby = $request->get('orderby')) !== '') {
            $query->orderBy('price', $orderby);
        }

        $rooms = $query->paginate(16);

        return view('rooms.index', compact('rooms'));
    }
}
