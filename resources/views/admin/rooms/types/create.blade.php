@extends('admin.app')

@section('title')
    后台管理-添加房间分类
@stop

@section('page')
    <div class="row">
        <h1 class="page-header">添加分类</h1>

        <form action="{{ route('admin.rooms.types.store') }}" method="POST">
        {!! csrf_field() !!}
        <!-- Name field -->
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">分类名称</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
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
