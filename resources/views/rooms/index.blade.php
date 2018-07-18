@extends('layouts.app')

@section('title')
    index
@stop
@section('content')

    <!-- ========== REVOLUTION SLIDER ========== -->
    <!-- =========== PAGE TITLE ========== -->
    <div class="page_title gradient_overlay" style="background: url({{asset('app/images/page_title_bg.jpg')}});">
        <div class="container">
            <div class="inner">
                <h1>Rooms List View</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Rooms List View</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- =========== MAIN ========== -->
    @include('rooms.partial.room')
    {!! $rooms->links() !!}

@endsection
