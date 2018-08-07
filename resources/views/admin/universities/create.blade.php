@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Create University</h1>
        {!! Form::open(['action' => 'Admin\UniversityController@store', 'method' => 'POST']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('accepting', 'Accepting')}}
                {{Form::text('accepting', '', ['class' => 'form-control', 'placeholder' => 'Accepting'])}}
            </div>
            <div class="form-group">
                {{Form::label('phone', 'Phone')}}
                {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
            </div>
            <div class="form-group">
                {{Form::label('address', 'Address')}}
                {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address'])}}
            </div>
            <div class="form-group">
                {{Form::label('postal_code', 'Postal_code')}}
                {{Form::text('postal_code', '', ['class' => 'form-control', 'placeholder' => 'Postal code'])}}
            </div>
            <div class="form-group">
                {{Form::label('country', 'Country')}}
                <select selected="" class="form-control" name="country">
                    <option disabled selected value> -- select an option -- </option>
                    @foreach($country as $key)
                        <option>{{$key->country}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('city', 'City')}}
                <select selected="" class="form-control" name="city">
                    <option disabled selected value> -- select an option -- </option>
                    @foreach($city as $key)
                        <option>{{$key->city}}</option>
                    @endforeach
                </select>
            </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection