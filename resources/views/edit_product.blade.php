<form action="/api/update-product" method="post">
    @csrf
    <input type="text" name="name" id="name" value="{{$product->name}}"><br>
    <input type="hidden" name="id" id="id" value="{{$product->id}}"><br>
    <select name="category" id="category">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Edit Product</button>
</form>