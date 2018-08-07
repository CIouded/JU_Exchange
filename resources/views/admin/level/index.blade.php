@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Levels</h1>
    @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
    <a href="level/create" class="btn btn-success">Add</a>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Id</td>
                <td>Level</td>
            </tr>
        </thead>
        <tbody>
        @foreach($levels as $level)
            <tr>
                <td>{{ $level->Id }}</td>
                <td>{{ $level->level }}</td>
                @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
                <td>
                    <a href="level/{{$level->Id}}/edit" class="btn btn-default">Edit</a>
                    {!!Form::open(['action' => ['Admin\LevelController@destroy', $level->Id], 'method' => 'delete', 'class' => 'pull-right'])!!}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection