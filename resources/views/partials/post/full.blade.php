<div class="blog-post">
    <h2 class="blog-post-title">{{$post->name}}</h2>
<p class="blog-post-meta">{{date('F j, Y',strtotime($post->created_at))}} in <a href="{{route('categories.show',['category'=>$post->category])}}">{{$post->category->name}}</a></p>

    {{$post->content}}
</div>
