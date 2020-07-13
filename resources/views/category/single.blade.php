<p>
    Category: {{$category->name}}
</p>
<p>
    Description: {{$category->description}}
</p>
<h2>Posts</h2>
<ul>
    @forelse ($category->posts as $post)
        <li><a href="/post/{{$post->id}}"><h3>{{$post->name}}</h3></a></li>
    @empty
    <li><h3>No posts for this category</h3></li>
    @endforelse
</ul>
<h2>Comments</h2>
<ul>
    @forelse ($category->comments as $comment)
    <li>
        <h4>{{$comment->author}}</h4>
        {{$comment->content}}
    </li>
    @empty
    <li>
        <h4>No comments for this category</h4>
    </li>
    @endforelse
</ul>
