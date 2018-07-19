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
                    <li><a href="{{route("index")}}">Home</a></li>
                    <li>Rooms List View</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- =========== MAIN ========== -->
    @include('rooms.partial.room')
    {!! $rooms->links() !!}

@endsection


@section('script')
    <script>
        (function ($) {
            $('#search-form').on('submit', function (e) {
                e.preventDefault();

                var $data = $(this).serializeArray();
                $query = $data.reduce(function (query, curr) {
                    if (curr.name == 'discount' && curr.value == '') {
                        return query;
                    } else {
                        return query + curr.name + '=' + curr.value + '&';
                    }
                }, '?').slice(0, -1);

                window.location.href = '{{ url('/rooms/search') }}' + $query;
            });
        })(jQuery);
    </script>
@stop
