@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Edit University</h1>
        {!! Form::open(['action' => ['Admin\UniversityController@update', $university->Id], 'method' => 'put']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $university->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('accepting', 'Accepting')}}
                {{Form::text('accepting', '', ['class' => 'form-control', 'placeholder' => 'Accepting'])}}
            </div>
            <div class="form-group">
                {{Form::label('phone', 'Phone')}}
                {{Form::text('phone', $university->phone, ['class' => 'form-control', 'placeholder' => 'Phone'])}}
            </div>
            <div class="form-group">
                {{Form::label('address', 'Address')}}
                {{Form::text('address', $university->address, ['class' => 'form-control', 'placeholder' => 'Address'])}}
            </div>
            <div class="form-group">
                {{Form::label('postal_code', 'Postal_code')}}
                {{Form::text('postal_code', $university->postal_code, ['class' => 'form-control', 'placeholder' => 'Postal code'])}}
            </div>
            <div class="form-group">
                {{Form::label('country', 'Country')}}
                <select class="form-control" name="country">
                    <option>{{$university->country}}</option>>
                    @foreach($country as $key)
                        <option>{{$key->country}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('city', 'City')}}
                <select class="form-control" name="city">
                    <option>{{$university->city}}</option>
                    @foreach($city as $key)
                        <option>{{$key->city}}</option>
                    @endforeach
                </select>
            </div>   
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection
