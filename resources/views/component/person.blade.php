<div class="card m-2">
    <div class="card-body">
        <div class="m-2">
        <!--img class="mr-3 align-self-center ml-3 rounded-circle" style="width: 50px; height: 50px"
                 alt="image" src="{{//isset($post->User->multimedia) ?
                                         //'data:' . $post->User->multimedia->MimeType . ';base64,' . base64_encode($post->User->multimedia->Media) :
                                         //asset('assets/user-purple.svg')}}"-->
            <h5 class="card-text">{{$person->UserName}}</h5>
            <button type="submit" class="btn btn-primary">Connect</button>
            <button type="submit" class="btn btn-link">Follow</button>
        </div>
    </div>
</div>