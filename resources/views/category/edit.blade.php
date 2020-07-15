@extends('layouts.app')

@section('content')
<h3 class="pb-4 mb-4 font-italic border-bottom">
    Edit category
</h3>

{{-- Validation errors --}}
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    {{ $error }}
</div>
@endforeach
@endif

<form method="POST" action="{{route('categories.update',['category'=>$category])}}">
    @csrf
    @method('put')
    <input type="hidden" name="id" value="{{$category->id}}">

    <div class="form-group">
        <label for="formName">Category name</label>
        <input class="form-control" type="text" name="name" id="formName" placeholder="Enter category name..."
            value="{{$category->name}}">
    </div>
    <div class="form-group">
        <label for="formDescription">Category description</label>
        <input class="form-control" type="text" name="description" id="formDescription"
            placeholder="Enter form description" value="{{$category->description}}">
    </div>
    <button type="submit" class="btn btn-secondary">Update</button>
</form>

@endsection
