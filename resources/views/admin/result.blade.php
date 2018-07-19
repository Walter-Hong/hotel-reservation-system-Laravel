@extends('admin.app')

@section('title')
    searchresult
@stop

@section('page')
    <div class="row">
        <div class="alert alert-success">
            <p>totalincome {{ getIncoming($orders) }} pound</p>
        </div>

        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="page-header">history order({{ count($orders) }})</h1>
            @if (count($orders))
                <ul class="list-group">
                    <li class="list-group-item">
                        <b>user</b>
                        <b>roomnumber</b>
                        <b>bookingtime</b>
                        <b>departuretime</b>
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
                <p>no available </p>
            @endif
        </div>
    </div>
@stop
