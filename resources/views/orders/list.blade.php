@extends('layouts.app')

@section('title')
    MY ORDERS
@stop

@section('content')
    <!-- =========== PAGE TITLE ========== -->
    <div class="page_title gradient_overlay" style="background: url({{asset('app/images/page_title_bg.jpg')}});">
        <div class="container">
            <div class="inner">
                <h1>MY ORDERS</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>MY ORDERS</li>
                </ol>
            </div>
            {{--<div class="price">--}}
            {{--<div class="inner" style="width: 73px;">--}}
            {{--£{{ $room->price * $room->discount / 10 }} <span>per night</span>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

    <!-- =========== MAIN ========== -->
    <main id="room_page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <caption style="text-align: center"><h1>Current Reservation({{ count($orders) }})</h1>
                            </caption>
                            <thead>
                            <tr>
                                <th>user name</th>
                                <th>check in date</th>
                                <th>check out date</th>
                                <th>status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ displayPhone($order->name) }}</td>
                                    <td>{{ $order->check_in_at->format('Y-m-d') }}</td>
                                    <td>{{ $order->check_out_at->format('Y-m-d') }}</td>
                                    <td> @if($order->status==1) prepare
                                        @elseif($order->status==2) using
                                        @elseif($order->status==3) finish
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
