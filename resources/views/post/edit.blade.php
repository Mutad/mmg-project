@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{route('posts.update',['post'=>$post])}}">
    @csrf
    @method('put')
    <select name="category_id">
        @foreach (App\Category::all() as $category)
        <option value="{{$category->id}}"
            @if ($category->id==$post->category_id)
            selected="selected"
            @endif
            >{{$category->name}}</option>
        @endforeach
    </select>
    <input type="hidden" name="id" value="{{$post->id}}">
    <input type="text" name="name" value="{{$post->name}}">
    <textarea name="content" cols="30" rows="10">{{$post->content}}</textarea>
    <input type="submit" value="Submit">
</form>
