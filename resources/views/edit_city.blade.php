<form action="/api/update-city" method="post">
    @csrf
    <input type="text" name="name" id="name" value="{{$city->name}}"><br>
    <input type="hidden" name="id" id="id" value="{{$city->id}}"><br>
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
    <button type="submit">Edit City</button>
</form>