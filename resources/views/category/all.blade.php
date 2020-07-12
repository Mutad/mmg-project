<ul>
    @foreach (App\Category::all() as $category)
    <li>{{$category->name}}</li>
    @endforeach
</ul>
