@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="put" action="{{route('categories.update',['category'=>$category])}}">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    <input type="text" name="name" value="{{$category->name}}">
    <input type="text" name="description" value="{{$category->description}}">
    <input type="submit" value="Submit">
</form>
