@extends('layouts.admin')

@section('title')
    首页
@stop

@section('style')
    <style>
        .slide-container {
            height: 400px;
            overflow: hidden;
            position: relative;
        }

        .rslides {
            position: relative;
            list-style: none;
            overflow: hidden;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .rslides li {
            -webkit-backface-visibility: hidden;
            position: absolute;
            display: none;
            width: 100%;
            left: 0;
            top: 0;
        }

        .rslides li:first-child {
            position: relative;
            display: block;
            float: left;
        }

        .rslides img {
            display: block;
            height: auto;
            float: left;
            width: 100%;
            border: 0;
        }

        .slogan {
            position: absolute;
            top: 113px;
            left: 85px;
            z-index: 100;
            color: white;
        }

        .discard-btn {
            position: absolute;
            bottom: 30px;
            right: 50px;
            z-index: 99;
        }

        .home-des {
            padding: 30px 0;
        }

        .user-select {
            padding: 0 0 30px 0;
        }
    </style>
@stop

@section('content')
    <div class="slide-container">
        <ul class="rslides">
            <li><img src="{{ asset('img/wallpaper005.jpg') }}" alt=""></li>
            <li><img src="{{ asset('img/wallpaper006.jpg') }}" alt=""></li>
            <li><img src="{{ asset('img/wallpaper008.jpg') }}" alt=""></li>
        </ul>

        <div class="slogan">
            <h1>{{ $setting->welcome_title }}</h1>
            <p>{{ $setting->welcome_content }}</p>
        </div>
        <div class="discard-btn">
            <a href="{{ url('/rooms/search?discount') }}" class="btn btn-danger">查看全部打折房间</a>
        </div>
    </div>

    <section class="container">
        <div class="home-des text-center">
            <h2><i class="fa fa-btn fa-heart-o"></i>{{ $setting->service_title }}<i class="fa fa-heart-o"></i></h2>
            <p>{{ $setting->service_content }}</p>
        </div>

        <div class="user-select text-center">
            <h2><i class="fa fa-btn fa-home"></i>快速查找房间<i class="fa fa-home"></i></h2>
            <form action="#" id="price-form" method="GET">
                <div class="col-sm-offset-3 col-sm-6 input-group">
                    <span class="input-group-addon">¥</span>
                    <input type="number" name="low" class="form-control" placeholder="low price">
                    <span class="input-group-addon">~</span>
                    <input type="number" name="high" class="form-control" placeholder="最高价格">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
                </span>
                </div>
            </form>
        </div>
    </section>

    @include('layouts.partial.footer-admin')

@endsection

@section('script')
    <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
    <script>
        $(function () {
            $(".rslides").responsiveSlides();

            $('#price-form').on('submit', function (e) {
                e.preventDefault();

                $data = $(this).serializeArray();
                var query = $data.reduce(function (query, current) {
                    if (current.value)
                        return query += current.name + '=' + current.value + '&';
                    return query;
                }, '?').slice(0, -1);

                self.location.href = '{{ url('/rooms/search') }}' + query;
            });
        });
    </script>
@stop
