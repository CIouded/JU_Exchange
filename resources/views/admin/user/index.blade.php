@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Users</h1>
    <a href="admin/create" class="btn btn-success">Add</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Id</td>
                <td>name</td>
                <td>E-mail</td>
                <td>Role</td>
                <td>Programme</td>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role_title }}</td>
                <td>{{ $user->programme }}</td>
                <td>
                    <a href="admin/{{$user->id}}/edit" class="btn btn-default">Edit</a>
                    {!!Form::open(['action' => ['Admin\UserController@destroy', $user->id], 'method' => 'delete', 'class' => 'pull-right'])!!}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection