{{Form::label('programme', 'Programme')}}
    <select selected="" class="form-control" id="programme" name="programme">
        <option disabled selected value> -- select an option -- </option>
        @foreach($programme as $key)
            @if(Auth::user()->programme != null)
                @if(Auth::user()->programme == $key->title)
                    <option value="{{$key->Id}}">{{$key->title}}</option>
                @endif()
            @else
                <option value="{{$key->Id}}">{{$key->title}}</option>
            @endif 
        @endforeach
    </select>