@extends('layouts.admin')

@section('title')
    Room List
@stop

@section('content')
    <div class="container">
        @include('rooms.partial.room')
        {!! $rooms->links() !!}
    </div>
@stop
