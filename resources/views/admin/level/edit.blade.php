@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Edit Level</h1>
        {!! Form::open(['action' => ['Admin\LevelController@update', $level->Id], 'method' => 'put']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('level', 'Level')}}
                {{Form::text('level', $level->level, ['class' => 'form-control', 'placeholder' => 'Level'])}}
            </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection
