<form action="/api/update-category" method="post">
    @csrf
    <input type="text" name="name" id="name" value="{{$category->name}}"><br>
    <input type="hidden" name="id" id="id" value="{{$category->id}}"><br>
    <button type="submit">Edit Category</button>
</form>