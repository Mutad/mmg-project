<div class="border-bottom">
    <h4 class="blog-post-title"><a class="text-body"
            href="{{route('categories.show',['category'=>$category])}}">{{$category->name}}</a></h4>
    <p class="blog-post-meta">{{$category->description}}</p>
</div>
