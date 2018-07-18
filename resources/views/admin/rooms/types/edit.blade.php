@extends('admin.app')

@section('title')
    后台管理-房间分类修改
@stop

@section('page')
    <div class="row">
        <h1 class="page-header">{{ $type->name }}type</h1>
        <form action="{{ route('admin.rooms.types.update', ['id' => $type->id]) }}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="PATCH">
            <!-- Name field -->
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">room type</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $type->name }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <input type="submit" value="确认" class="btn btn-primary">
        </form>
    </div>
@stop
