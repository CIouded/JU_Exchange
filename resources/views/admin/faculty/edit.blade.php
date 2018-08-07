@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Edit Faculty</h1>
        {!! Form::open(['action' => ['Admin\FacultyController@update', $faculty->Id], 'method' => 'put']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $faculty->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                    {{Form::label('university', 'University')}}
                    <select class="form-control" name="university">
                    <option>{{$faculty->university}}</option>
                        @foreach($university as $key)
                            <option>{{$key->name}}</option>
                        @endforeach
                    </select>
                </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection
