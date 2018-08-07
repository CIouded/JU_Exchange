@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Add level</h1>
        {!! Form::open(['action' =>  'Admin\LevelController@store', 'method' => 'POST']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('level', 'Level')}}
                {{Form::text('level', '', ['class' => 'form-control', 'placeholder' => 'Level'])}}
            </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection