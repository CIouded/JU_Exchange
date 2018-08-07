@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Edit Programme</h1>
    {!! Form::open(['action' => ['Admin\ProgrammeController@update', $programme->Id], 'method' => 'put']) !!}
        @csrf
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $programme->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::text('description', $programme->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('level', 'Level')}}
            <select selected="" class="form-control" name="level">
                <option>{{$programme->level}}</option>
                @foreach($level as $key)
                    <option>{{$key->level}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('faculty', 'Faculty')}}
            <select selected="" class="form-control" name="faculty">
                <option>{{$programme->faculty}}</option>
                @foreach($faculty as $key)
                    <option>{{$key->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('university', 'University')}}
            <select selected="" class="form-control" name="university">
                <option>{{$programme->university}}</option>
                @foreach($university as $key)
                    <option>{{$key->name}}</option>
                @endforeach
            </select>
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
