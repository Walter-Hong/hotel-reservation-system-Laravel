@extends('admin.app')
@section('meta')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop
@section('title')
    edit room
@stop

@section('page')
    <div class="row">
        <h3 class="page-header">edit no:{{ $room->no }} room</h3>

        <form id="edit-form" action="{{ route('admin.rooms.update', ['id' => $room->id]) }}" method="POST"
              enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="PATCH">

            <div class="form-group{{ $errors->has('no') ? ' has-error' : '' }}">
                <label for="no">room no</label>
                <input type="text" class="form-control" id="no" name="no" value="{{ old('no') ?: $room->no }}">
                @if ($errors->has('no'))
                    <span class="help-block">
                    <strong>{{ $errors->first('no') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('room_type_id') ? ' has-error' : '' }}">
                <label for="room_type_id">room type</label>
                <select name="room_type_id" id="room_type_id" class="form-control">
                    @foreach ($types as $id => $type)
                        <option value="{{ $id }}" {{ $room->room_type_id == $id ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @if ($errors->has('room_type_id'))
                    <span class="help-block">
                    <strong>{{ $errors->first('room_type_id') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('info') ? ' has-error' : '' }}">
                <label for="info">info</label>
                <input type="text" class="form-control" id="info" name="info"
                       value="{{ old('info') ?: $room->info }}">
                @if ($errors->has('info'))
                    <span class="help-block">
                    <strong>{{ $errors->first('info') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label for="price">price / night</label>
                <input type="text" class="form-control" id="price" name="price"
                       value="{{ old('price') ?: $room->price }}">
                @if ($errors->has('price'))
                    <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                <label for="discount">discount (%)</label>
                <input type="number" class="form-control" id="discount" name="discount" max="100" min="0"
                       placeholder="0 - 100" value="{{ old('discount') ?: $room->discount }}">
                @if ($errors->has('discount'))
                    <span class="help-block">
                    <strong>{{ $errors->first('discount') }}</strong>
                </span>
                @endif
            </div>


            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <label for="room_type_id">room status</label>
                <select name="status" id="status" class="form-control">
                    <option value="0" {{ $room->status == 0 ? 'selected' : '' }}>reserved</option>
                    <option value="1" {{ $room->status == 1 ? 'selected' : '' }}>available</option>
                </select>
                @if ($errors->has('status'))
                    <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image">picture</label>
                <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
                @if ($errors->has('image'))
                    <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
                @endif
                <img src="{{ asset($room->image) }}">
            </div>

            <input type="submit" value="save" class="btn btn-primary">
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">INFO</h4>
                </div>
                <div class="modal-body">
                    Edit Success!
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">continue</a>
                    <a type="button" href="{{route('admin.rooms.index')}}" class="btn btn-primary">return</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        (function ($) {
            $('#edit-form').on('submit', function (e) {
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.rooms.update', ['id' => $room->id]) }}",
                    type: "POST",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function (data) {
                       $("#myModal").modal()
                    },
                    error: function (e) {
                        alert("error！！");
                    }
                });
            });
        })(jQuery);
    </script>
@stop