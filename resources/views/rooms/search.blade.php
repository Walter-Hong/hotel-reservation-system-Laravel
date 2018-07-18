@extends('layouts.admin')

@section('title')
    查询结果如下
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <form action="#" id="search-form">
                    <div class="form-group">
                        <label for="low">最低价</label>
                        <input type="number" class="form-control" id="low" name="low">
                    </div>
                    <div class="form-group">
                        <label for="high">最高价</label>
                        <input type="number" class="form-control" id="high" name="high">
                    </div>
                    <div class="form-group">
                        <!-- Discount field -->
                        <div class="form-group">
                            <label for="discount">折扣</label>
                            <input type="number" class="form-control" id="discount" name="discount">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-md-11">
                @include('rooms.partial.room')
            </div>
        </div>
    </div>
@stop

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
                        return query += curr.name + '=' + curr.value + '&';
                    }
                }, '?').slice(0, -1);

                window.location.href = '{{ url('/rooms/search') }}' + $query;
            });
        })(jQuery);
    </script>
@stop
