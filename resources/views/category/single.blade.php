@extends('layouts.app')

@section('content')

{{-- Breadcrumb with navigation --}}
<div class="breadcrumb d-flex justify-content-between align-items-center">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
    </ol>
    <div>
        <a href="{{route('posts.create.with_id',['category_id'=>$category->id])}}" class="btn btn-primary">Write a
            post</a>
        <a href="{{route('categories.edit',['category'=>$category])}}" class="btn btn-primary">Edit category</a>
        <a href="{{route('categories.destroy',['category'=>$category])}}" class="btn btn-danger">Delete category</a>
    </div>
</div>
{{-- /.Breadcrumb --}}

{{-- Show all posts --}}
@include('partials.post.list',['posts'=>$data])

@include('partials.paginator',['data'=>$data])
{{-- /.Show all posts --}}


{{-- All comments --}}
@include('partials.comments',['comments'=>$category->comments,'formAction'=>route('comment.category',['category'=>$category])])
{{-- /.All comments --}}

{{-- /.Comments --}}

@endsection
