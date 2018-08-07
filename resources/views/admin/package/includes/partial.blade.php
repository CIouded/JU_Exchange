{{Form::label('faculty', 'Faculty')}}
    <select selected="" class="form-control" id="faculty" name="faculty">
        <option disabled selected value> -- select an option -- </option>
        @foreach($faculty as $key)
            <option>{{$key->name}}</option>
        @endforeach
    </select>