<div class="list-group">
    @foreach ($comments as $comment)
    <div class="list-group-item">
        <h4>{{$comment->author}}</h4>
        {{$comment->content}}
    </div>
    @endforeach

    @isset($formAction)
    <form class="list-group-item" action="{{$formAction}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="formName">Your name</label>
                <input class="form-control" name="name" id="formName" type="text" placeholder="Input your name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="formSurname">Your last name</label>
                <input class="form-control" name="surname" id="formSurname" type="text" placeholder="Input your surname" required>
            </div>

        </div>
        <label for="formComment">Your comment</label>
        <div class="input-group mb-3">
            <textarea type="text" class="form-control" name="comment" id="formComment" placeholder="Enter your comment..." aria-describedby="button-addon2"></textarea>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
            </div>
        </div>
    </form>
    @endisset

</div>
