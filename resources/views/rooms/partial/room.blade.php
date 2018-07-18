<main id="rooms_list">
    <div class="container">

        @foreach ($rooms->all() as $room)


            <!-- ITEM -->
                <article class="room_list">
                    <div class="row row-flex">
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <figure>
                                <a href="{{ route('orders.create', ['id' => $room->no]) }}" class="hover_effect h_link h_blue">
                                    <img src="{{ asset($room->image) }}" class="img-responsive" alt="Image">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <div class="room_details row-flex">
                                <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                                    <h3><a href="{{ route('orders.create', ['id' => $room->no]) }}"> {{ $room->type->name }} </a></h3>
                                    <p> good room</p>
                                    <div class="room_services">
                                        <i class="fa fa-coffee" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Breakfast Included" data-original-title="Breakfast"></i>
                                        <i class="fa fa-cutlery" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Restaurant" data-original-title="Zante Restaurant"></i>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                                    <div class="room_price_inner">
                                        <span class="room_price_number"> €{{ $room->price }}   </span>
                                        <small class="upper"> per night </small>
                                        <a href="{{ route('orders.create', ['id' => $room->no]) }}" class="button  btn_blue btn_full upper">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
        @endforeach


        {{--<nav class="a_center">--}}
            {{--<ul class="pagination mt50 mb0">--}}
                {{--<li class="prev_pagination"><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
                {{--<li class="active"><a href="#">1</a></li>--}}
                {{--<li><a href="#">2</a></li>--}}
                {{--<li><a href="#">3</a></li>--}}
                {{--<li><a href="#">4</a></li>--}}
                {{--<li><a href="#">5</a></li>--}}
                {{--<li><a href="#">6</a></li>--}}
                {{--<li class="next_pagination"><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}

    </div>
</main>


