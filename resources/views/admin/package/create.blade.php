@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Add Package</h1>
    {!! Form::open(['action' => 'Admin\PackageController@store', 'method' => 'POST']) !!}
        @csrf
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('university', 'University')}}
            <select selected="" class="form-control" id="university" name="university">
                <option disabled selected value> -- select an option -- </option>
                @foreach($university as $key)
                    <option value="{{$key->Id}}">{{$key->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            @include('admin.package.includes.partial', ['faculty' => $faculty])
        </div>
        <div id="course">
            <div class="form-group" id="course">
                @include('admin.package.includes.partial2', ['course' => $course])       
            </div>
        </div>
        <input type="button" id="add" class="btn btn-success" value="Add">
        <div class="form-group">
            {{Form::label('partner_university', 'Partner University')}}
            <select selected="" class="form-control" id="partner_university" name="partner_university">
                <option disabled selected value> -- select an option -- </option>
                @foreach($university as $key)
                    <option value="{{$key->Id}}">{{$key->name}}</option>
                @endforeach
            </select>
        </div>
        <div id="pu-course">
            <div class="form-group">
                @include('admin.package.includes.partial4', ['course' => $course])
            </div>
        </div>
        <input type="button" id="add-pu-course" class="btn btn-success" value="Add">
        <div class="form-group">
            {{Form::label('match', 'Match')}}
            <input type="range" min="0" max="10" step="1" name="match_value" onchange="change(this.value)"></input>
            <span id="slider">5<span>
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
<script>
    //Update course and faculty selections depending on selected university
    $('#university').on('change', function(e) {
        console.log(e);

        let university_id = e.target.value;

        $.get('create/subcat?university_id=' + university_id, function(data) {
            console.log(data);
            $('#faculty').empty();
            $.each(data, function(index, Obj) {
                $('#faculty').append('<option value="'+Obj.Id+'">'+Obj.name+'</option>')
            })
        });

        $.get('create/subcourse?university_id=' + university_id, function(data) {
            console.log(data);
            $('.course').empty();
            $.each(data, function(index, Obj) {
                $('.course').append('<option value="'+Obj.Id+'">'+Obj.name+'</option>')
            })
        });
    });

    //Update course selections depending on selected university
    $('#partner_university').on('change', function(e) {
        console.log(e);

        let university_id = e.target.value;

        $.get('create/subcourse?university_id=' + university_id, function(data) {
            console.log(data);
            $('.pu_course').empty();
            $.each(data, function(index, Obj) {
                $('.pu_course').append('<option value="'+Obj.Id+'">'+Obj.name+'</option>')
            })
        });
    });  
    
    function change(val)
    {
        document.getElementById("slider").innerHTML = val;
    }
    
    //Appends new course select menus to page
    $('#add').click(function() {
        let course = $('{{Form::label("course", "Course")}}\
        <select selected="" class="form-control course" name="course[]">\
            <option disabled selected value> -- select an option -- </option>\
            @foreach($course as $key)\
                <option>{{$key->name}}</option>\
            @endforeach\
        </select>');
        $('#course').append(course);
    });

    $('#add-pu-course').click(function() {
            let course = $('{{Form::label("course", "Course")}}\
        <select selected="" class="form-control pu_course" id="pu_course" name="course[]">\
            <option disabled selected value> -- select an option -- </option>\
            @foreach($course as $key)\
                <option>{{$key->name}}</option>\
            @endforeach\
        </select>');
        $('#pu-course').append(course);
    });
</script>
@endsection