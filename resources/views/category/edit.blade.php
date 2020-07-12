<form method="post">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    <input type="text" name="name" value="{{$category->name}}">
    <input type="text" name="description" value="{{$category->description}}">
    <input type="submit" value="Submit">
</form>
