<form action="/api/insert-area" method="post">
    @csrf
    <input type="text" name="name" id="name"><br>
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
    <button type="submit">add state</button>
</form>