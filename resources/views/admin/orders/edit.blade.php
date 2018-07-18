@extends('admin.app')

@section('title')
    后台管理-修改入住状态
@stop

@section('page')
    <div class="row">
        <h3 class="page-header">修改{{ $order->id }}房间</h3>

        <form action="{{ route('admin.orders.update', ['id' => $order->id]) }}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="PATCH">

            <div class="form-group">
                <select name="order_status" id="order_status" class="form-control">
                    <option value="1">未入住</option>
                    <option value="2">正入住</option>
                    <option value="3">已退房</option>
                </select>
            </div>
            <input type="submit" value="确认" class="btn btn-primary">
        </form>
    </div>
@stop
