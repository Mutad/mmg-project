@extends('layouts.app')

@section('content')

{{-- Breadcrumb with navigation --}}
<div class="breadcrumb d-flex justify-content-between align-items-center">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item active">Latest posts</li>
    </ol>
    <div>
        <a href="{{route('categories.create')}}" class="btn btn-primary">Create category</a>
        <a href="{{route('posts.create')}}" class="btn btn-primary">Write a post</a>
    </div>
</div>
{{-- /.Breadcrumb --}}

{{-- All brief posts --}}
@foreach (App\Post::all() as $post)
@include('partials.post.brief',['post'=>$post])
@endforeach
{{-- /.All brief posts --}}

{{-- Pagination --}}
<nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
</nav>
{{-- /.Pagination --}}
@endsection
