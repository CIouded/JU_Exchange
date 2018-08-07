@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Programmes</h1>
    @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
    <a href="programme/create" class="btn btn-success">Add</a>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Description</td>
                <td>Level</td>
                <td>Faculty</td>
                <td>University</td>
            </tr>
        </thead>
        <tbody>
        @foreach($programmes as $programme)
            <tr>
                <td>{{ $programme->Id }}</td>
                <td>{{ $programme->title }}</td>
                <td>{{ $programme->description }}</td>
                <td>{{ $programme->level }}</td>
                <td>{{ $programme->faculty }}</td>
                <td>{{ $programme->university }}</td>
                <td>
                    @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
                    <a href="programme/{{$programme->Id}}/edit" class="btn btn-default">Edit</a>
                    {!!Form::open(['action' => ['Admin\ProgrammeController@destroy', $programme->Id], 'method' => 'delete', 'class' => 'pull-right'])!!}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection