@extends('layouts.master')
@section('content')
<div class="container">
        <h1>Add Course</h1>
        {!! Form::open(['action' => 'Admin\CourseController@store', 'method' => 'POST']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
            <div class="form-group">
                {{Form::label('credits', 'Credits')}}
                {{Form::text('credits', '', ['class' => 'form-control', 'placeholder' => 'Credits'])}}
            </div>
            <div class="form-group">
                {{Form::label('university', 'University')}}
                <select selected="" class="form-control" name="university">
                    <option disabled selected value> -- select an option -- </option>
                    @foreach($university as $key)
                        <option>{{$key->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('programme', 'Programme')}}
                <select selected="" class="form-control" name="programme">
                    <option disabled selected value> -- select an option -- </option>
                    @foreach($programme as $key)
                        <option>{{$key->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('level', 'Level')}}
                <select selected="" class="form-control" name="level">
                    <option disabled selected value> -- select an option -- </option>
                    @foreach($level as $key)
                        <option>{{$key->level}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('faculty', 'Faculty')}}
                <select selected="" class="form-control" name="faculty">
                    <option disabled selected value> -- select an option -- </option>
                    @foreach($faculty as $key)
                        <option>{{$key->name}}</option>
                    @endforeach
                </select>
            </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection