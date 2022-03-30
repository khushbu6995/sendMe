<form action="/api/update-area" method="post">
    @csrf
    <input type="text" name="name" id="name" value={{$area->name}}><br>
    <input type="hidden" name="id" id="id" value={{$area->id}}><br>
    <select name="city" id="city">
        @foreach ($cities as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select><br>
    <select name="state" id="state">
        @foreach ($states as $state)
        <option value="{{$state->id}}">{{$state->name}}</option>
        @endforeach
    </select><br>
    <select name="country" id="country">
        @foreach ($countries as $country)
        <option value="{{$country->id}}">{{$country->name}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Edit Area</button>
</form>