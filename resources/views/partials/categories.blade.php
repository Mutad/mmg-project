<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @forelse (App\Category::all() as $category)
        <a class="p-2 text-muted" href="{{route('categories.show',['category'=>$category])}}">{{$category->name}}</a>
        @empty
        <p class="p-2 text-muted">
            No categories found
            <a href="{{route('categories.create')}}">create one</a>
        </p>
        @endforelse
    </nav>
</div>
