@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Edit Country</h1>
        {!! Form::open(['action' => ['Admin\CountryController@update', $country->Id], 'method' => 'put']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('country', 'Country')}}
                {{Form::text('country', $country->country, ['class' => 'form-control', 'placeholder' => 'Country'])}}
            </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection
