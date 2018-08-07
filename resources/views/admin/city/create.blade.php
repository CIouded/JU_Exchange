@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Add City</h1>
        {!! Form::open(['action' => 'Admin\CityController@store', 'method' => 'POST']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('city', 'City')}}
                {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
            </div>
            <div class="form-group">
                <select class="form-control" name="country">
                    <option disabled selected value> -- select an option -- </option>
                    @foreach($country as $key)
                        <option>{{$key->country}}</option>
                    @endforeach
                </select>
            </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection