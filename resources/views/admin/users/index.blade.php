@extends('admin.app')

@section('title')
    managerment
@stop

@section('page')

    <div class="row">
        <div class="col-md-6">
            <h1 class="page-header">users</h1>
        </div>
        <div class="col-md-6">
            <h3>
                <div class="search">
                    <form method="get" class="widget_search">
                        <input type="search" name="keyword" placeholder="Searching...">
                        <button class="search_btn" id="searchsubmit" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </h3>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>role</th>
                <th>option</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'admin' : 'user' }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" style='display: inline'
                              method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-sm btn-danger btn-xs" onclick="return confirm('delete?')">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $users->links() !!}
    </div>
@stop