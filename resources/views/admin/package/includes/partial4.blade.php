{{Form::label('course', 'Course')}}
    <select selected="" class="form-control pu_course" id="pu_course" name="course[]">
        <option disabled selected value> -- select an option -- </option>
        @foreach($course as $key)
            <option>{{$key->name}}</option>
        @endforeach
    </select>