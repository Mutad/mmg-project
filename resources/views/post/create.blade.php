@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" action="{{route('posts.store')}}">
    @csrf
    <select name="category_id">
        @foreach (App\Category::all() as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <input type="text" name="name">
    <textarea name="content" cols="30" rows="10"></textarea>
    <input type="file" name="file">
    <input type="submit" value="Submit">
</form>
