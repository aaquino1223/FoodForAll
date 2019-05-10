<div class="card" style="margin-bottom: 20px">
    <div class="card-header">
        <div class="row">
            <div class="media">
                <img class="mr-3 align-self-center ml-3" alt="image">
                <div class="media-body">
                    <p class="card-text">{{$post->PostDate->toDayDateTimeString()}}</p>
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
</div>