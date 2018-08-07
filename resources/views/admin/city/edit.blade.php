@extends('layouts.master')
@section('content')
<div class="container">

        <h1>Edit City</h1>
        {!! Form::open(['action' => ['Admin\CityController@update', $city->Id], 'method' => 'put']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('city', 'City')}}
                {{Form::text('city', $city->city, ['class' => 'form-control', 'placeholder' => 'City'])}}
            </div>
            <select class="form-control" name="country">
                <option>{{$city->country}}</option>
                @foreach($country as $key)
                    <option>{{$key->country}}</option>
                @endforeach
            </select>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection
