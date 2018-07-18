@extends('admin.app')

@section('title')
    后台管理-房间分类
@stop

@section('page')
    <div class="row">
        <h1 class="page-header">room type
            <small><a href="{{ route('admin.rooms.types.create') }}" class="btn btn-danger btn-xs"><i
                            class="fa fa-plus"></i></a></small>
        </h1>

        <form action="#" method="POST">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>房间</th>
                    <th>修改</th>
                    <th>删除</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ count($type->rooms) }} 间</td>
                        <td>
                            <a href="{{ route('admin.rooms.types.edit', ['id' => $type->id]) }}"
                               class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.rooms.types.destroy', ['id' => $type->id]) }}"
                                  style='display: inline' method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-danger btn-xs" onclick="return confirm('确定删除?')"><i
                                            class="fa fa-remove"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>
    </div>
@stop