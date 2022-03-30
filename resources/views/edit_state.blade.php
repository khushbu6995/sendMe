<form action="/api/update-state" method="post">
    @csrf
    <input type="text" name="name" id="name" value={{$state->name}}><br>
    <input type="hidden" name="id" id="id" value={{$state->id}}><br>
    <select name="country" id="country">
        @foreach ($countries as $country)
        <option value="{{$country->id}}">{{$country->name}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">edit state</button>
</form>