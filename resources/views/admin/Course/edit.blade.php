@extends('layouts.master')
@section('content')
<div class="container">
        <h1>Edit Course</h1>
        {!! Form::open(['action' => ['Admin\CourseController@update', $course->Id], 'method' => 'put']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $course->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $course->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
            <div class="form-group">
                {{Form::label('credits', 'Credits')}}
                {{Form::text('credits', $course->credits, ['class' => 'form-control', 'placeholder' => 'Credits'])}}
            </div>
            <div class="form-group">
                {{Form::label('university', 'University')}}
                <select selected="$course->university" class="form-control" name="university">
                <option>{{$course->university}}</option>
                    @foreach($university as $key)
                        <option>{{$key->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('programme', 'Programme')}}
                <select selected="$course->programme" class="form-control" name="programme">
                        <option>{{$course->programme}}</option>
                    @foreach($programme as $key)
                        <option>{{$key->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('level', 'Level')}}
                <select selected="" class="form-control" name="level">
                    <option>{{$course->level}}</option>
                    @foreach($level as $key)
                        <option>{{$key->level}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('faculty', 'Faculty')}}
                <select selected="" class="form-control" name="faculty">
                    <option>{{$course->faculty}}</option>
                    @foreach($faculty as $key)
                        <option>{{$key->name}}</option>
                    @endforeach
                </select>
            </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection
