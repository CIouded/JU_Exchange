@extends('layouts.master')
@section('content')
<div class="container">

    <h1>Edit Package</h1>
    {!! Form::open(['action' => ['Admin\PackageController@update', $package->Id], 'method' => 'put']) !!}
        @csrf
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $package->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::text('description', $package->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('university', 'University')}}
            <select selected="" class="form-control" id="university" name="university">
                <option value="142">Jönköping University</option>
            </select>
        </div>
        <div class="form-group">
            @include('admin.package.includes.partial2', ['programme' => $programme])
        </div>
        <div class="form-group">
            {{Form::label('partner_university', 'Partner University')}}
            <select selected="" class="form-control" id="partner_university" name="partner_university">
                <option value="{{$package->pu_Id}}">{{ $package->partner_university }}</option>
            </select>
        </div>
        <div id="pu-course">
            <input type="button" id="add-pu-course" class="btn btn-success" value="Add">
            <div class="form-group">
            
            </div>
        </div>
        @foreach($course_package as $p_course)
            @if($p_course->Package_Id = $package->Id)
                <div class="form-group">
                    <input type="hidden" name="p_id" value="{{$package->Id}}">
                    <input type="hidden" name="c_id" value="{{$p_course->id}}">
                    <input type="hidden" name="c_package[]" value="{{$p_course->id}}">
                    <select class="form-control pu_course" id="pu_course" name="edit_course[]">
                        <option value="{{$p_course->id}}"disabled selected>{{$p_course->Course_name}}</option>
                        @foreach($pu_course as $key)
                            <option value="{{$key->Id}}">{{$key->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        @endforeach
        <div class="form-group">
            {{Form::label('match', 'Match')}}
        <input type="range" min="0" max="10" step="1" name="match_value" onchange="change(this.value)" value="{{$package->match_value}}">
        <span id="slider">{{$package->match_value}}<span>
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
<script>
    function change(val)
    {
        document.getElementById("slider").innerHTML = val;
    }
    
    //Appends new course select menus to page
    $('#add-pu-course').click(function() {
            let course = $('<div class="form-group">{{Form::label("course", "Course")}}\
            <select selected="" class="form-control pu_course" id="pu_course" name="course[]">\
            <option disabled selected value> -- select an option -- </option>\
            @foreach($pu_course as $key)\
                <option value="{{$key->Id}}">{{$key->name}}</option>\
            @endforeach\
        </select></div>');
        $('#pu-course').append(course);
    });
</script>
@endsection
