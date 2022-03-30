<form action="/api/insert-state" method="post">
    @csrf
    <input type="text" name="name" id="name"><br>
    <select name="country" id="country">
        @foreach ($countries as $country)
        <option value="{{$country->id}}">{{$country->name}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">add state</button>
</form>