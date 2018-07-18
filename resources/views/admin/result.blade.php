@extends('admin.app')

@section('title')
    查询结果
@stop

@section('page')
    <div class="row">
        <div class="alert alert-success">
            <p>总收入 {{ getIncoming($orders) }} 元</p>
        </div>

        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="page-header">历史订单({{ count($orders) }})</h1>
            @if (count($orders))
                <ul class="list-group">
                    <li class="list-group-item">
                        <b>用户</b>
                        <b>房间号</b>
                        <b>预约日期</b>
                        <b>退房日期</b>
                    </li>
                    @foreach ($orders as $order)
                        <li class="list-group-item">
                            <b>{{ $order->phone }}</b>
                            <b>
                                <a href="{{ route('orders.create', ['no' => $order->room->no]) }}">
                                    {{ $order->room->no }}
                                </a>
                            </b>
                            <b>{{ $order->check_in_at->format('Y-m-d') }}</b>
                            <b>{{ $order->check_out_at->format('Y-m-d') }}</b>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>暂时没有</p>
            @endif
        </div>
    </div>
@stop
