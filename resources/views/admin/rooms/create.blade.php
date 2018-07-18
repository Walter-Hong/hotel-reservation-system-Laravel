@extends('admin.app')

@section('title')
    后台管理-添加房间
@stop

@section('page')
    <div class="row">
        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('no') ? ' has-error' : '' }}">
            <label for="no">房间号</label>
            <input type="text" class="form-control" id="no" name="no" value="{{ old('no') }}">
            @if ($errors->has('no'))
                    <span class="help-block">
                    <strong>{{ $errors->first('no') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('room_type_id') ? ' has-error' : '' }}">
                <label for="room_type_id">房间类型</label>
                <select name="room_type_id" id="room_type_id" class="form-control">
                    @foreach ($types as $id => $type)
                        <option value="{{ $id }}">{{ $type }}</option>
                    @endforeach
                </select>
                @if ($errors->has('room_type_id'))
                    <span class="help-block">
                    <strong>{{ $errors->first('room_type_id') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label for="price">价格 / 天</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                @if ($errors->has('price'))
                    <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                <label for="discount">折扣</label>
                <input type="number" class="form-control" id="discount" name="discount" max="10" min="0"
                       placeholder="0 - 10" value="{{ old('discount') }}">
                @if ($errors->has('discount'))
                    <span class="help-block">
                    <strong>{{ $errors->first('discount') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image">图片</label>
                <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
                @if ($errors->has('image'))
                    <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
                @endif
            </div>

            <input type="submit" value="确认" class="btn btn-primary">
        </form>
    </div>
@stop
