@extends('layouts.app')

@section('title')
    BOOK ROOM
@stop

@section('content')
    <!-- =========== PAGE TITLE ========== -->
    <div class="page_title gradient_overlay" style="background: url({{asset('app/images/page_title_bg.jpg')}});">
        <div class="container">
            <div class="inner">
                <h1>BOOK</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Rooms BOOK</li>
                </ol>
            </div>
            <div class="price">
                <div class="inner" style="width: 73px;">
                    €{{ $room->price * $room->discount / 10 }} <span>per night</span>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== MAIN ========== -->
    <main id="room_page">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sidebar">
                        <aside class="widget">
                            <!-- ========== BOOKING FORM ========== -->
                            <div class="vbf">
                                <h2 class="form_title"><i class="fa fa-calendar"></i> BOOK ONLINE</h2>
                                <form class="inner" action="{{ route('orders.store') }}"
                                      method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="no" value="{{ $room->no }}">
                                    <div class="form-group">
                                        <label for="no">Room INFO</label>
                                        <p>No:{{ $room->no }} -{{ $room->type->name }} <br>
                                            € {{ $room->price * $room->discount / 10 }}
                                            <span style="text-decoration:line-through;">{{ $room->price}}</span>
                                            <span>/ night</span>
                                        </p>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input class="form-control" name="name" placeholder="Enter Your Name"
                                               type="text">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <input class="form-control" name="phone" value="{{ old('phone') }}"
                                               placeholder="Enter Your Phone Number" type="number">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('check_in_at') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="input-group">
                                            <div class="form_date">
                                                <input type="text" class="datepicker form-control md_noborder_right"
                                                       value="{{ old('check_in_at') }}" name="check_in_at"
                                                       placeholder="Arrival Date" readonly>
                                                @if ($errors->has('check_in_at'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('check_in_at') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('check_out_at') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="input-group">
                                            <div class="form_date">
                                                <input type="text" class="datepicker form-control"
                                                       name="check_out_at" value="{{ old('check_out_at') }}"
                                                       placeholder="Departure Date" readonly>
                                                @if ($errors->has('check_out_at'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('check_out_at') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button btn_lg btn_blue btn_full" type="submit">BOOK A ROOM NOW
                                    </button>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="table-responsive">
                        <table class="table">
                            <caption style="text-align: center"><h1>Current Reservation({{ count($room->orders) }})</h1></caption>
                            <thead>
                            <tr>
                                <th>user</th>
                                <th>check in date</th>
                                <th>check out date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($room->orders as $order)
                                <tr>
                                    <td>{{ displayPhone($order->phone) }}</td>
                                    <td>{{ $order->check_in_at->format('Y-m-d') }}</td>
                                    <td>{{ $order->check_out_at->format('Y-m-d') }}</td>
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
