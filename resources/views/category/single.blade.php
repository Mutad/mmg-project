@extends('layouts.app')

@section('content')

{{-- Breadcrumb with navigation --}}
<div class="breadcrumb d-flex justify-content-between align-items-center">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
    </ol>
    <div>
        <a href="{{route('posts.create.with_id',['category_id'=>$category->id])}}" class="btn btn-primary">Write a post</a>
        <a href="{{route('categories.edit',['category'=>$category])}}" class="btn btn-primary">Edit category</a>
        <a href="{{route('categories.destroy',['category'=>$category])}}" class="btn btn-danger">Delete category</a>
    </div>
</div>
{{-- /.Breadcrumb --}}

{{-- Show all posts --}}
@if ($category->posts->count()>0)
@foreach ($category->posts as $post)
@include('partials.post.brief',['post'=>$post])
{{-- Pagination --}}
<nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
</nav>
{{-- /.Pagination --}}
@endforeach
@else
<h3 class="pb-4 mb-4 font-italic border-bottom">
    No posts for this category. <a href="{{route('posts.create')}}">Create one</a>
</h3>
@endif
{{-- /.Show all posts --}}



{{-- Comments --}}
@if($category->comments->count()>0)
<h3 class="pb-4 mb-4 font-italic border-bottom">
    Comments:
</h3>

{{-- All comments --}}
@foreach ($category->comments as $comment)
{{$comment->content}}
@endforeach
{{-- /.All comments --}}

@else
<h3 class="pb-4 mb-4 font-italic border-bottom">
    No comments for this category.
</h3>
@endif
{{-- /.Comments --}}

@endsection
