{{Form::label('course', 'Course')}}
    <select selected="" class="form-control course" id="course" name="course2">
        <option disabled selected value> -- select an option -- </option>
        @foreach($course as $key)
            <option>{{$key->name}}</option>
        @endforeach
    </select>