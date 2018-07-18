<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['room' => function($query)
        {
            return $query->with('type');
        }])->orderBy('check_in_at', 'DESC')
           ->paginate(12);

        return view('admin.orders.index', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->delete();
        }

        flashy()->success('删除成功', '#');

        return back();
    }

    public function edit($id){
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->status = $request->get('order_status');
        $order->save();
        return redirect(Route('admin.orders.index'));
    }
}
