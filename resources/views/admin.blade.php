@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul style="list-style-type: none;">
                            <li><a href="home/faculty">Faculties</a></li>
                            <li><a href="home/universities">Universities</a></li>
                            <li><a href="home/level">Level</a></li>
                            <li><a href="home/countries">Countries</a></li>
                            <li><a href="home/city">Cities</a></li>
                            <li><a href="home/programme">Programme</a></li>
                            <li><a href="home/course">Course</a></li>
                            <li><a href="home/package">Package</a></li>
                            @if(Auth::user()->hasRole('Super_admin')) 
                                <li><a href="home/admin">Admin</a></li>
                            @endif
                        </ul>
    
                        You are logged in as an admin at the admin dashboard!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection