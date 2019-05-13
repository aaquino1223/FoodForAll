<script>
    function toggle() {
        var x = document.getElementById("commentForm");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

<div class="card" style="margin-bottom: 20px">
    <div class="card-header">
        <div class="row">
            <div class="media">
                <img class="mr-3 align-self-center ml-3 rounded-circle" style="width: 50px; height: 50px"
                    alt="image" src="{{isset($user->multimedia) ? '' : asset('assets/user-purple.svg')}}">
                <div class="media-body">
                    <p class="card-text m-0">{{$post->User->UserName}}</p>
                    <p class="card-text m-0">{{$post->PostDate->toDayDateTimeString()}}</p>
                    @isset($location)
                        <h6 class="card-subtitle">{{$location}}</h6>
                    @endisset
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <h5 class="card-title ">{{ $post->Title }}</h5>
        <p class="card-text">{{ $post->Message }}</p>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-6 text-center">
                <button type="button" class="btn btn-default" aria-label="Like" style="width: 50px; height: 50px">
                    <img src="{{asset('/assets/like.svg')}}" class="img-fluid" alt="like">
                </button>
                <button type="button" class="btn btn-default" aria-label="Dislike" style="width: 50px; height: 50px">
                    <img src="{{asset('/assets/dislike.svg')}}" class="img-fluid" alt="dislike">
                </button>
            </div>
            <div class="col-6 text-center">
                <button type="button" onclick="toggle()" class="btn btn-default" aria-label="Comment" style="width: 50px; height: 50px">
                    <img src="{{asset('/assets/comment.svg')}}" class="img-fluid" alt="comment">
                </button>
                <Label aria-label="Comment">Comment</Label>
            </div>
        </div>
    </div>
    <div class="card-footer" id="commentForm">
        <input class="form-control" type="text" placeholder="Write a comment...">
        <!--div class="row">
            <div class="col-4">
                <button type="button" class="btn btn-link">Like</button>
                <button type="button" class="btn btn-link">Dislike</button>
            </div>
        </div-->
    </div>
</div>