<form action="/api/insert-category" method="post">
    @csrf
    <input type="text" name="name" id="name"><br>
    <button type="submit">add Category</button>
</form>