@extends('admin.app')

@section('title')
    后台管理-用户管理
@stop

@section('page')
    <div class="row">
        <h1 class="page-header">users`</h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>邮箱</th>
                <th>身份</th>
                <th>删除</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? '管理员' : '用户' }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" style='display: inline'
                              method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-sm btn-danger btn-xs" onclick="return confirm('确定删除?')">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $users->links() !!}
    </div>
@stop