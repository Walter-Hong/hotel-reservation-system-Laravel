@extends('admin.app')

@section('title')
    后台管理-房间管理
@stop

@section('page')
    <div class="row">
        <h1 class="page-header">rooms
            <small><a href="{{ route('admin.rooms.create') }}" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i></a>
            </small>
        </h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th width="1%">ID</th>
                <th>no</th>
                <th>pic</th>
                <th>type</th>
                <th>price / night</th>
                <th>discount</th>
                <th>modify</th>
                <th>delete</th>
                <th>book</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->no }}</td>
                    <td><img src="{{ asset($room->image) }}" width="30"></td>
                    <td>{{ $room->type->name }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->discount }} 折</td>
                    <td><a href="{{ route('admin.rooms.edit', ['id' => $room->id]) }}" class="btn btn-primary btn-xs"><i
                                    class="fa fa-pencil"></i></a></td>
                    <td>
                        <form action="{{ route('admin.rooms.destroy', ['id' => $room->id]) }}" style='display: inline'
                              method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-sm btn-danger btn-xs" onclick="return confirm('确定删除?')"><i
                                        class="fa fa-remove"></i></button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('orders.create', ['no' => $room->no]) }}" class="btn btn-info btn-xs"><i
                                    class="fa fa-plus"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $rooms->links() !!}
    </div>
@stop
