@extends('layouts.admin')

@section('style')
    <style>
        @media (min-width: 768px) {
            #page-wrapper {
                position: inherit;
                margin: 20px 0 0 250px;
                padding: 0 30px;
                border-left: 1px solid #e7e7e7;
            }
        }
    </style>
@stop

@section('sidebar')
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav app-navbar-collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav in" id="side-menu">
                <li>
                    <a href="{{ url('admin') }}"><i class="fa fa-fw fa-dashboard"></i> control pannel</a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}"><i class="fa fa-fw fa-calculator"></i> orders</a>
                </li>
                <li>
                    <a href="{{ route('admin.setting') }}"><i class="fa fa-fw fa-cog"></i> setting</a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}"><i class="fa fa-fw fa-users"></i> users</a>
                </li>
                <li>
                    <a href="{{ route('admin.rooms.types.index') }}"><i class="fa fa-fw fa-tags"></i> room type</a>
                </li>
                <li>
                    <a href="{{ route('admin.rooms.index') }}"><i class="fa fa-fw fa-credit-card-alt"></i> rooms</a>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('content')
    <div id="page-wrapper">
        @yield('page')
    </div>
@stop

@section('footer')
@stop
