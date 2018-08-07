@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Cities</h1>
    @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
    <a href="city/create" class="btn btn-success">Add</a>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Id</td>
                <td>City</td>
            </tr>
        </thead>
        <tbody>
        @foreach($cities as $city)
            <tr>
                <td>{{ $city->Id }}</td>
                <td>{{ $city->city }}</td>
                <td>{{ $city->country }}</td>
                @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
                <td>
                    <a href="city/{{$city->Id}}/edit" class="btn btn-default">Edit</a>
                    {!!Form::open(['action' => ['Admin\CityController@destroy', $city->Id], 'method' => 'delete', 'class' => 'pull-right'])!!}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection