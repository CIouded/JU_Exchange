@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Courses</h1>
    @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
    <a href="course/create" class="btn btn-success">Add</a>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Description</td>
                <td>Credits</td>
                <td>Programme</td>
                <td>University</td>
                <td>Faculty</td>
                <td>Level</td>
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->Id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->credits }}</td>
                <td>{{ $course->programme }}</td>
                <td>{{ $course->university }}</td>
                <td>{{ $course->faculty }}</td>
                <td>{{ $course->level }}</td>
                @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
                <td>
                    <a href="course/{{$course->Id}}/edit" class="btn btn-default">Edit</a>
                    {!!Form::open(['action' => ['Admin\CourseController@destroy', $course->Id], 'method' => 'delete', 'class' => 'pull-right'])!!}
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