@extends('layouts.app')

@section('content')

{{-- Breadcrumb with navigation --}}
<div class="breadcrumb d-flex justify-content-between align-items-center">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
    <div>
        <a href="{{route('categories.create')}}" class="btn btn-primary">Create category</a>
        <a href="{{route('posts.create')}}" class="btn btn-primary">Write a post</a>
    </div>
</div>
{{-- /.Breadcrumb --}}


{{-- All brief posts --}}
<h2 class="py-4 font-italic border-bottom">Latest posts:</h2>
@include('partials.post.list',['posts'=>App\Post::all()->sortByDesc('created_at')->take(5)])
<a href="{{route('posts.index')}}" class="btn btn-primary btn-block my-3">Read more</a>
{{-- /.All brief posts --}}


{{-- All categories --}}
<h2 class="py-4 font-italic border-bottom">Latest Categories:</h2>
@include('partials.category.list',['categories'=>App\Category::all()->sortByDesc('created_at')->take(5)])
<a href="{{route('categories.index')}}" class="btn btn-primary btn-block my-3">Read more</a>
{{-- /.All categories --}}

@endsection
