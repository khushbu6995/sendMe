<form action="/api/update-country" method="post">
    @csrf
    <input type="text" name="name" id="name" value={{$country->name}}><br>
    <input type="text" name="code" id="code" value={{$country->code}}><br>
    <input type="hidden" name="id" id="id" value={{$country->id}}><br>
    <button type="submit">update Country</button>
</form>