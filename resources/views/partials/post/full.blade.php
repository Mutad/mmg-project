<div class="blog-post">
    <h2 class="blog-post-title">{{$post->name}}</h2>
<p class="blog-post-meta">{{date('F j, Y',strtotime($post->created_at))}} in <a href="{{route('categories.show',['category'=>$post->category])}}">{{$post->category->name}}</a></p>

    <p>{{$post->content}}</p>

    @if (!empty($post->file_path))
    <a href="/storage/files/{{$post->file_path}}" class="btn btn-secondary">Linked file</a>
    @endif
</div>
