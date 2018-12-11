{{Form::label('programme', 'Programme')}}
    <select selected="" class="form-control" id="programme" name="programme">
        <option value="{{$package->programme_Id}}">{{ $package->programme }}</option>
        @foreach($programme as $key)
            <option value="{{$key->Id}}">{{$key->title}}</option>
        @endforeach
    </select>