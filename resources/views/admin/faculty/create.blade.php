@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Add Faculty</h1>
        {!! Form::open(['action' =>  'Admin\FacultyController@store', 'method' => 'POST']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
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
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection