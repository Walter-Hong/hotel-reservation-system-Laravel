@extends('admin.app')

@section('title')
    order manage
@stop

@section('page')
    <h1 class="page-header">order manage</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th><i class="fa fa-home"></i></th>
            <th><i class="fa fa-money"></i></th>
            <th><i class="fa fa-tags"></i></th>
            <th><i class="fa fa-phone"></i></th>
            <th><i class="fa fa-credit-card-alt"></i></th>
            <th>check in date</th>
            <th>check out date</th>
            <th>status</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->room_no }}</td>
                <td>£: {{ $order->room->price * $order->check_in_at->diffInDays($order->check_out_at) }}</td>
                <td>{{ $order->room->type->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->check_in_at->format('Y-m-d') }}</td>
                <td>{{ $order->check_out_at->format('Y-m-d') }}</td>
                <td> @if($order->status==1) prepare @elseif($order->status==2) using @elseif($order->status==3) finish @endif</td>
                <td><a href="{{ route('admin.orders.edit', ['id' => $order->id]) }}" class="btn btn-primary btn-xs"><i
                                class="fa fa-pencil"></i></a></td>
                <td>
                    <form action="{{ route('admin.orders.destroy', ['id' => $order->id]) }}" style='display: inline'
                          method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger btn-xs" onclick="return confirm('confirm delete?')"><i
                                    class="fa fa-remove"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $orders->links() !!}
@stop
