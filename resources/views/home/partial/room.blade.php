<!-- ========== FAVORITE ROOMS ========== -->
<section class="white_bg" id="rooms">
    <div class="container">

        <div class="main_title mt_wave a_center">
            <h2>OUR FAVORITE ROOMS</h2>
        </div>
        <p class="main_description a_center">
            {{ $setting->company }}</p>
        @foreach (array_chunk($rooms->all(), 3) as $row)
            <div class="row">
                @foreach ($row as $room)
                    <div class="col-md-4">
                        <article class="room">
                            <figure>
                                <div class="price">
                                    <span class="room_price_number"> £ {{ $room->price * (100 -$room->discount )/100 }}
                                        @if($room->discount != 0)
                                            <span style="text-decoration:line-through !important;">{{ $room->price}}</span>
                                        @endif
                                        </span>
                                    <span>/ night </span>
                                </div>
                                <a class="hover_effect h_blue h_link"
                                   href="{{ route('orders.create', ['no' => $room->no]) }}">
                                    <img src="{{ asset($room->image) }}" class="img-responsive"
                                         alt="Image">
                                </a>
                                <figcaption>
                                    <h4>
                                        <a href="{{ route('orders.create', ['no' => $room->no]) }}">{{ $room->type->name }}</a>
                                    </h4>
                                    <span class="f_right">
                                        <a href="{{ route('orders.create', ['no' => $room->no]) }}"
                                           class="button btn_sm btn_blue">Book it</a>
                                    </span>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="mt40 a_center">
            <a class="button btn_sm btn_yellow" href="{{ route('rooms.index') }}">VIEW ROOMS LIST</a>
        </div>
    </div>
</section>