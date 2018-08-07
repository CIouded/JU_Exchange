@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Edit Package</h1>
    {!! Form::open(['action' => ['Admin\PackageController@update', $package->Id], 'method' => 'put']) !!}
        @csrf
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $package->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::text('description', $package->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('university', 'University')}}
            <select selected="" class="form-control" name="university">
                <option>{{$package->home_university}}</option>
                @foreach($university as $key)
                    <option>{{$key->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('faculty', 'Faculty')}}
            <select selected="" class="form-control" name="faculty">
                <option>{{$package->faculty}}</option>
                @foreach($faculty as $key)
                    <option>{{$key->name}}</option>
                @endforeach
            </select>
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
    {!! Form::open(['action' => 'Admin\PackageController@updatePackage', 'method' => 'post']) !!}
        {{Form::label('package', 'Package')}}
        <div class="form-group">    
            <select selected="selected" class="form-control" name="package">
                <option>{{$package->title}}</option>
            </select>
        </div>
        <div class="form-group">
            {{Form::label('assign_course', 'Assign course')}}
            <select class="form-control" name="course">
                <option disabled selected value> -- select an option -- </option>
                @foreach($course as $key)
                    <option>{{$key->name}}</option>
                @endforeach
            </select>
        </div>
    {{Form::submit('Add', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Course</td>
            </tr>
        </thead>
        <tbody>
            @foreach($package->courses as $course)
                {!!Form::open(['action' => 'Admin\PackageController@removeCourse', 'method' => 'delete', 'class' => 'pull-right'])!!}
                    <tr>
                        <td><input type="hidden" name="id" value="{{$course->Id}}">{{$course->Id}}</td>
                        <td><input type="hidden" name="pid" value="{{$package->Id}}">{{$package->Id}}</td>
                        <td>{{$course->name}}</td>
                        <td>
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        </td>
                    </tr>
                {!!Form::close()!!}
            @endforeach
        </tbody>
    </table>
</div>
@endsection
