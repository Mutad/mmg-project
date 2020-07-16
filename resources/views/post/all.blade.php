@extends('layouts.app')

@section('content')

{{-- Breadcrumb with navigation --}}
<div class="breadcrumb d-flex justify-content-between align-items-center">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Latest posts</li>
    </ol>
    <div>
        <a href="{{route('categories.create')}}" class="btn btn-primary">Create category</a>
        <a href="{{route('posts.create')}}" class="btn btn-primary">Write a post</a>
    </div>
</div>
{{-- /.Breadcrumb --}}

{{-- Posts list --}}
@include('partials.post.list',['posts'=>$data])

{{-- Paginator --}}
@include('partials.paginator',['data'=>$data])

@endsection
