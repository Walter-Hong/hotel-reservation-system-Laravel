<main id="rooms_list">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="sidebar">
                    <aside class="widget">
                        <form action="#" id="search-form" class="form-inline">
                            <div class="form-group">
                                <label for="low">minimum price</label>
                                <input type="number" class="form-control" id="low" name="low">
                            </div>
                            <div class="form-group">
                                <label for="high">highest price</label>
                                <input type="number" class="form-control" id="high" name="high">
                            </div>
                            <!-- Discount field -->
                            <div class="form-group">
                                <label for="discount">discount</label>
                                <input type="number" class="form-control" id="discount" name="discount">
                            </div>
                            <div class="form-group">
                                <select name="orderby" class="form-control" title="Select order by"
                                        id="order-by"
                                        data-header="order by">
                                        <option value="asc"> order by price asc</option>
                                        <option value="desc">order by price desc</option>
                                </select>
                            </div>

                            <button type="submit" class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </aside>
                </div>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <aside class="widget">
                        <div class="search">
                            <form action="{{route('rooms.search')}}" id="search-form" class="widget_search">
                                <input type="search" name="keyword" placeholder="eg: wifi、tv">
                                <button class="search_btn" id="searchsubmit" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    @foreach ($rooms->all() as $room)
        <!-- ITEM -->
            <article class="room_list">
                <div class="row row-flex">
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <figure>
                            <a href="{{ route('orders.create', ['id' => $room->no]) }}"
                               class="hover_effect h_link h_blue">
                                <img src="{{ asset($room->image) }}" class="img-responsive" alt="Image">
                            </a>
                        </figure>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="room_details row-flex">
                            <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                                <h3>
                                    <a href="{{ route('orders.create', ['id' => $room->no]) }}"> {{ $room->type->name }} </a>
                                </h3>
                                <p> {{ $room->info }} </p>
                                <div class="room_services">
                                    <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                       data-trigger="hover" data-content="Breakfast Included"
                                       data-original-title="Breakfast"></i>
                                    <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                       data-trigger="hover" data-content="Restaurant"
                                       data-original-title="Zante Restaurant"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                                <div class="room_price_inner">
                                        <span class="room_price_number"> £ {{ $room->price * (100 -$room->discount )/100 }}
                                            @if($room->discount != 0)
                                                <br>
                                                <span style="text-decoration:line-through !important;">{{ $room->price}}</span>
                                            @endif
                                        </span>
                                    <small class="upper"> per night</small>
                                    <a href="{{ route('orders.create', ['id' => $room->no]) }}"
                                       class="button  btn_blue btn_full upper">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach

    </div>
</main>


