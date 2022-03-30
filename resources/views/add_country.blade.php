<form action="/api/insert-country" method="post">
    @csrf
    <input type="text" name="name" id="name"><br>
    <input type="text" name="code" id="code"><br>
    <button type="submit">add Country</button>
</form>