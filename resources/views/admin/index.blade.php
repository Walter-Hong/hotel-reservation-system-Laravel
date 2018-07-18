@extends('admin.app')

@section('title')
    后台管理
@stop

@section('page')
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-info">
                <i class="fa fa-bell">
                    酒店总收入 {{ $data['total'] }} 元
                </i>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('admin.search') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="room_type">房间类型</label>
                    <select name="room_type" class="form-control">
                        @foreach ($types as $id => $type)
                            <option value="{{ $id }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="查询" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{ route('admin.search') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                <label for="room_no">房间号</label>
                <select name="room_no" class="form-control">
                        @foreach ($rooms as $id => $room)
                            <option value="{{ $id }}">{{ $room }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="查询" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{ route('admin.search') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>日期</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <input type="submit" value="查询" class="btn btn-primary">
            </form>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-md-12">
            <form action="{{ route('admin.search') }}" method="POST">
                {!! csrf_field() !!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="date" name="check_in_at" class="form-control" placeholder="开始日期">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="date" name="check_out_at" class="form-control" placeholder="截止日期">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
                </div>
            </form>
        </div>
    </div>
@stop
