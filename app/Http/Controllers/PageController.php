<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = RoomType::query()->get();
        $rooms = Room::with('type')->paginate(18);

        return view('home.home', compact('rooms', 'types'));
    }
}
