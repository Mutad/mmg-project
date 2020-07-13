<ul>
    @foreach (App\Category::all() as $category)
    <li><a href="{{route('categories.show',['category'=>$category])}}">{{$category->name}}</a></li>
    @endforeach
</ul>
