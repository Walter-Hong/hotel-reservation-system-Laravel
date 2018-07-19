<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->with(['room' => function ($query) {
                return $query->with('type');
            }])->orderBy('check_in_at', 'DESC')
            ->paginate(12);

        return view('orders.list', compact('orders'));
    }

    public function create($no)
    {
        $room = Room::where('no', $no)
            ->with(['orders' => function ($query) {
                return $query->where('check_out_at', '>=', Carbon::today());
            }])
            ->firstOrFail();

        return view('orders.create', compact('room'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no' => 'required|exists:rooms,no',
            'phone' => 'required|phone',
            'name' => 'required',
            'check_in_at' => 'required|date|after:today',
            'check_out_at' => 'required|date|after:check_in_at|live_half_month_and_not_conflict'
        ], [], [
            'phone' => 'phone',
            'name' => 'name',
            'check_in_at' => 'arrival date',
            'check_out_at' => 'departure date'
        ]);

        Order::create([
            'room_no' => $request->get('no'),
            'phone' => $request->get('phone'),
            'name' => $request->get('name'),
            'user_id' => Auth::user()->id,
            'check_in_at' => Carbon::parse($request->get('check_in_at')),
            'check_out_at' => Carbon::parse($request->get('check_out_at')),
        ]);

        flashy()->success('book success', '#');

        return redirect('/');
    }
}
