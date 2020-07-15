@extends('layouts.app')

@section('content')

{{-- Breadcrumb with navigation --}}
<div class="breadcrumb d-flex justify-content-between align-items-center">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All categories</li>
    </ol>
    <div>
        <a href="{{route('categories.create')}}" class="btn btn-primary">Create category</a>
    </div>
</div>
{{-- /.Breadcrumb --}}

{{-- All categories --}}
@foreach (App\Category::all() as $category)
<p>
<h3><a class="text-body" href="{{route('categories.show',['category'=>$category])}}">{{$category->name}}</a></h3>
{{$category->description}}
</p>
@endforeach
{{-- /.All categories --}}

{{-- Pagination --}}
<nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
</nav>
{{-- /.Pagination --}}
@endsection
