@if (!empty($posts) && $posts->count())
@foreach ($posts as $post)
@include('partials.post.brief',['post'=>$post])
@endforeach
@else
<h3 class="pb-4 mb-4 font-italic border-bottom">
    Posts not found. <a href="{{route('posts.create')}}">Create one</a>
</h3>
@endif
