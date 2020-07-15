<div class="blog-post border-bottom">
    <h2 class="blog-post-title"><a class="text-body" href="{{route('posts.show',['post'=>$post])}}">{{$post->name}}</a></h2>
    <p class="blog-post-meta">{{date('F j, Y',strtotime($post->created_at))}} in <a href="{{route('categories.show',['category'=>$post->category])}}">{{$post->category->name}}</a></p>
</div>
