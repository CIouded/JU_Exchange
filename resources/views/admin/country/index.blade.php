@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Countries</h1>
    @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
    <a href="countries/create" class="btn btn-success">Add</a>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Id</td>
                <td>Country</td>
            </tr>
        </thead>
        <tbody>
        @foreach($countries as $country)
            <tr>
                <td>{{ $country->Id }}</td>
                <td>{{ $country->country }}</td>
                @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
                <td>
                    <a href="countries/{{$country->Id}}/edit" class="btn btn-default">Edit</a>
                    {!!Form::open(['action' => ['Admin\CountryController@destroy', $country->Id], 'method' => 'delete', 'class' => 'pull-right'])!!}
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