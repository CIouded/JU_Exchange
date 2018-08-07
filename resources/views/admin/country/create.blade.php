@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Add Country</h1>
        {!! Form::open(['action' => 'Admin\CountryController@store', 'method' => 'POST']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('country', 'Country')}}
                {{Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Country'])}}
            </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection