@if (!empty($categories) && $categories->count())
@foreach ($categories as $category)
@include('partials.category.full',['category'=>$category])
@endforeach
@else
<h3 class="pb-4 mb-4 font-italic border-bottom">
    Categories not found. <a href="{{route('categories.create')}}">Create one</a>
</h3>
@endif
