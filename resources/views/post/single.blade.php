@extends('layouts.app')

@section('content')

{{-- Breadcrumb with navigation --}}
<div class="breadcrumb d-flex justify-content-between align-items-center">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a
                href="{{route('categories.show',['category'=>$post->category])}}">{{$post->category->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$post->name}}</li>
    </ol>
    <div>
        <a href="{{route('posts.edit',['post'=>$post])}}" class="btn btn-primary">Edit post</a>
        <a href="{{route('posts.destroy',['post'=>$post])}}" class="btn btn-danger">Delete post</a>
    </div>
</div>
{{-- /.Breadcrumb with navigation --}}

@include('partials.post.full',['post'=>$post])

{{-- Comments --}}
@include('partials.comments',['comments'=>$post->comments,'formAction'=>route('comment.post',['post'=>$post])])

@endsection
