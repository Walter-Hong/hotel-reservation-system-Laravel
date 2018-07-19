@extends('admin.app')

@section('title')
    management-add room
@stop

@section('page')
    <div class="row">
        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('no') ? ' has-error' : '' }}">
                <label for="no">room no</label>
                <input type="text" class="form-control" id="no" name="no" value="{{ old('no') }}">
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
                <label for="price">price / night</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                @if ($errors->has('price'))
                    <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                <label for="discount">discount (%)</label>
                <input type="number" class="form-control" id="discount" name="discount" max="100" min="0"
                       placeholder="0 - 100" value="{{ old('discount') }}">
                @if ($errors->has('discount'))
                    <span class="help-block">
                    <strong>{{ $errors->first('discount') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <label for="room_type_id">room status</label>
                <select name="status" id="status" class="form-control">
                    <option value="0" >reserved</option>
                    <option value="1" >available</option>
                </select>
                @if ($errors->has('status'))
                    <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image">pic</label>
                <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
                @if ($errors->has('image'))
                    <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
                @endif
            </div>

            <input type="submit" value="save" class="btn btn-primary">
        </form>
    </div>
@stop
