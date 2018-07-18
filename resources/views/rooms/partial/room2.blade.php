@foreach (array_chunk($rooms->all(), 4) as $row)
    <div class="row">
        @foreach ($row as $room)
            <div class="col-sm-3">
                <div class="room-card">
                    <div class="room-img">
                        <img class="img-responsive" src="{{ asset($room->image) }}">
                        <div class="room-discount">{{ $room->discount }}折</div>
                    </div>
                    <div class="room-info">
                        <p>
                            <span class="label label-danger">{{ $room->type->name }}</span>
                            <span class="label label-primary">{{ $room->no }}</span>
                            <span class="label label-danger">{{ $room->price }} ¥/天</span>
                        </p>
                    </div>
                    @if (Auth::check() && Auth::user()->is_admin)
                        <div class="room-order">
                            <a href="{{ route('orders.create', ['id' => $room->no]) }}">
                                <button class="btn btn-default">预约</button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endforeach