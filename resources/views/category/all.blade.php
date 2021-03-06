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
@include('partials.category.list',['categories'=>$data])
{{-- /.All categories --}}

@include('partials.paginator',['data'=>$data])


@endsection
