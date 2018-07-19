@extends('admin.app')

@section('title')
     managemen-modify status
@stop

@section('page')
    <div class="row">
        <h3 class="page-header">edit order {{ $order->id }} status</h3>

        <form action="{{ route('admin.orders.update', ['id' => $order->id]) }}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="PATCH">

            <div class="form-group">
                <select name="order_status" id="order_status" class="form-control">
                    <option value="1">prepare</option>
                    <option value="2">using</option>
                    <option value="3">finish</option>
                </select>
            </div>
            <input type="submit" value="save" class="btn btn-primary">
        </form>
    </div>
@stop
