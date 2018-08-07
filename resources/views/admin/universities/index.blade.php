@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Universities</h1>
    @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
    <a href="universities/create" class="btn btn-success">Add</a>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Accepting</td>
                <td>Address</td>
                <td>Postal code</td>
                <td>Country</td>
                <td>City</td>
            </tr>
        </thead>
        <tbody>
        @foreach($universities as $university)
            <tr>
                <td>{{ $university->Id }}</td>
                <td>{{ $university->name }}</td>
                <td>{{ $university->accepting_nr }}</td>
                <td>{{ $university->phone }}</td>
                <td>{{ $university->address }}</td>
                <td>{{ $university->postal_code }}</td>
                <td>{{ $university->country }}</td>
                <td>{{ $university->city }}</td>
                @if(Auth::user()->hasRole('Super_admin') || Auth::user()->hasRole('Admin_user')) 
                <td>
                    <a href="universities/{{$university->Id}}/edit" class="btn btn-default">Edit</a>
                    {!!Form::open(['action' => ['Admin\UniversityController@destroy', $university->Id], 'method' => 'delete', 'class' => 'pull-right'])!!}
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