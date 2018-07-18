<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with('type')->paginate(12);

        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = RoomType::lists('name', 'id');

        return view('admin.rooms.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no' => 'required|unique:rooms,no',
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|integer',
            'discount' => 'numeric|between:0,10',
            'image' => 'required|image'
        ], [], [
            'no' => '房间号',
            'room_type_id' => '房间类型',
            'price' => '价格',
            'discount' => '折扣',
            'image' => '图片'
        ]);

        $room = new Room;
        $room->no           = $request->get('no');
        $room->room_type_id = $request->get('room_type_id');
        $room->price        = $request->get('price');
        $room->discount     = $request->get('discount');

        $image = $request->file('image');
        $path = 'img/rooms/' . str_random(10) . $image->getClientOriginalName();

        Image::make($image->getRealPath())
            ->resize(350, 280)
            ->save(public_path() . '/' . $path);

        $room->image = $path;
        $room->save();

        flashy()->success('添加成功', '#');

        return redirect(route('admin.rooms.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $types = RoomType::lists('name', 'id');

        return view('admin.rooms.edit', compact('room', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no' => 'required|unique:rooms,no,' . $id,
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|integer',
            'discount' => 'numeric|between:0,10',
            'image' => 'image'
        ], [], [
            'quantity' => 'quantity',
            'room_type_id' => '房间类型',
            'price' => '价格',
            'discount' => '折扣',
            'image' => '图片'
        ]);

        $room = Room::findOrFail($id);
        $room->no           = $request->get('no');
        $room->room_type_id = $request->get('room_type_id');
        $room->price        = $request->get('price');
        $room->discount     = $request->get('discount');

        if ($image = $request->file('image')) {
            $path = 'img/rooms/' . str_random(10) . $image->getClientOriginalName();

            Image::make($image->getRealPath())
                ->resize(350, 280)
                ->save(public_path() . '/' . $path);

            $room->image = $path;
        }

        $room->save();

        flashy()->success('修改成功', '#');

        return redirect(route('admin.rooms.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        if ($room) {
            $room->delete();
        }

        flashy()->success('删除成功', '#');

        return back();
    }
}
