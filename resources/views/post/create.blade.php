@extends('layouts.app')

@section('content')
<h3 class="pb-4 mb-4 font-italic border-bottom">
    Create post
</h3>

{{-- Show validation errors --}}
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    {{ $error }}
</div>
@endforeach
@endif

<form method="POST" action="{{route('posts.store')}}">
    @csrf

    <div class="form-group">
        <label for="formSelect">Post category</label>
        <select class="form-control" name="category_id" id="formSelect">
            @foreach (App\Category::all() as $category)
            <option value="{{$category->id}}" @if($category->id == $selected)selected @endif)>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="formName">Post name</label>
        <input class="form-control" placeholder="Input post name..." type="text" id="formName" name="name">
    </div>
    <div class="form-group">
        <label for="formContent">Post content</label>
        <textarea class="form-control" id="formContent" name="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-secondary">Create</button>
</form>
@endsection
