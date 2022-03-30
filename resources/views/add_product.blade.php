<form action="/api/insert-product" method="post">
    @csrf
    <input type="text" name="name" id="name"><br>
    <select name="category" id="category">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">add Product</button>
</form>