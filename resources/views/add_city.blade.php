<form action="/api/insert-city" method="post">
    @csrf
    <input type="text" name="name" id="name"><br>
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
    <button type="submit">add City</button>
</form>