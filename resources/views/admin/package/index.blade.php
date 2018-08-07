@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Packages</h1>
    <hr>
    @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
        <a href="package/create" class="btn btn-success">Add</a>
    @endif
    <hr>
    @foreach($packages as $package)
    <h2>{{ $package->title }}</h2>
    <hr>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Title</td>
                <td>Description</td>
                <td>University</td>
                <td>Faculty</td>
                <td>Partner University</td>
                <td>Match</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $package->title }}</td>
                <td>{{ $package->description }}</td>
                <td>{{ $package->home_university }}</td>
                <td>{{ $package->faculty }}</td>
                <td>{{ $package->partner_university }}</td>
                <td>{{ $package->match_value }}</td>
                <td>
                @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
                <a href="package/{{$package->Id}}/edit" class="btn btn-warning">Edit</a>
                    {!!Form::open(['action' => ['Admin\PackageController@destroy', $package->Id], 'method' => 'delete', 'class' => 'pull-right'])!!}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
                @endif
        </tbody>
    </table>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>{{$package->home_university}} Courses</td>
            </tr>
        </thead>
        @foreach($package->courses as $course)
            <tbody>
                <tr>
                    @if($course->University_Id === $package->university_Id)
                        <td>{{$course->name}}</td>
                    @endif
                </tr>
            </tbody>
        @endforeach
    </table>
    <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>{{$package->partner_university}} Courses</td>
                </tr>
            </thead>
            @foreach($package->courses as $course)
                <tbody>
                    <tr>
                        @if($course->University_Id === $package->pu_Id)
                            <td>{{$course->name}}</td>
                        @endif   
                    </tr>
                </tbody>
            @endforeach
        </table>
        <hr>
    @endforeach     
</div>
@endsection