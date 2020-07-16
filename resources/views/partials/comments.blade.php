{{-- Comments --}}
<h3 class="pt-4 my-4 font-italic">
    Comments:
</h3>

<div class="list-group" id="commentList">
    @isset($formAction)
    <form class="list-group-item" onsubmit="sendRequest();return false;">

        @csrf
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="formName">Your name</label>
                <input class="form-control" name="firstName" id="formName" type="text" placeholder="Input your name"
                    required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="formSurname">Your last name</label>
                <input class="form-control" name="lastName" id="formSurname" type="text"
                    placeholder="Input your surname" required>
            </div>

        </div>
        <label for="formComment">Your comment</label>
        <div class="input-group mb-3">
            <textarea type="text" class="form-control" name="content" id="formComment"
                placeholder="Enter your comment..." aria-describedby="button-addon2"></textarea>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
            </div>
        </div>
    </form>

    @forelse ($comments as $comment)
    <div class="list-group-item">
        <h4>{{$comment->author}}</h4>
        {{$comment->content}}
    </div>
    @empty
    @endforelse


    <script>
        const firstName = document.getElementById("formName");
const lastName = document.getElementById("formSurname");
const content = document.getElementById("formComment");
const commentList = document.getElementById('commentList');

function sendRequest() {
    window.axios
        .post("{{$formAction}}", {
            firstName: firstName.value,
            lastName: lastName.value,
            content: content.value
        })
        .then(function(response) {
            commentList.innerHTML+= '<div class="list-group-item"><h4>'+response.data.author+'</h4>'+response.data.content+'</div>'
            firstName.value = "";
            lastName.value = "";
            content.value = "";

        })
        .catch(function(error) {
            console.log(error);
            return false;
        });
}
    </script>
    @endisset

</div>
