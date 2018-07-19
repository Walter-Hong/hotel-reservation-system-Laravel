@extends('admin.app')

@section('title')
    management-add room type
@stop

@section('page')
    <div class="row">
        <h1 class="page-header">add roomtype</h1>

        <form action="{{ route('admin.rooms.types.store') }}" method="POST">
        {!! csrf_field() !!}
        <!-- Name field -->
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">typename</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <input type="submit" value="confirm" class="btn btn-primary">
        </form>
    </div>
@stop
