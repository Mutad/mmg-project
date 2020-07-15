@extends('layouts.app')

@section('content')
<h3 class="pb-4 mb-4 font-italic border-bottom">
    Edit post
</h3>

{{-- Show validation errors --}}

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    {{ $error }}
</div>
@endforeach
@endif

<form method="POST" action="{{route('posts.update',['post'=>$post])}}">
    @csrf
    @method('put')
    <input type="hidden" name="id" value="{{$post->id}}">

    <div class="form-group">
        <label for="formSelect">Post category</label>
        <select class="form-control" name="category_id" id="formSelect">
            @foreach (App\Category::all() as $category)
            <option value="{{$category->id}}" @if ($category->id==$post->category_id)
                selected="selected"
                @endif
                >{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="formName">Post name</label>
        <input class="form-control" placeholder="Input post name..." type="text" id="formName" name="name"
            value="{{$post->name}}">
    </div>
    <div class="form-group">
        <label for="formContent">Post content</label>
        <textarea class="form-control" id="formContent" name="content" rows="3">{{$post->content}}</textarea>
    </div>
    <button type="submit" class="btn btn-secondary">Update</button>
</form>
@endsection
