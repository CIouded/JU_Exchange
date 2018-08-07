@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Edit user</h1>
    {!! Form::open(['action' => ['Admin\UserController@update', $user->id], 'method' => 'put']) !!}
        @csrf
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            {{Form::label('role', 'Role')}}
            <select selected="" class="form-control" name="role">
                <option>{{$user->role_title}}</option>
                @foreach($role as $key)
                    <option>{{$key->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('programme', 'Programme')}}
            <select selected="" class="form-control" name="programme">
                <option>{{$user->programme}}</option>
                @foreach($programme as $key)
                    <option>{{$key->title}}</option>
                @endforeach
            </select>
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
