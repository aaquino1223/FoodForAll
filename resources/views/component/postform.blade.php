<div class="row justify-content-end">
    <div class="col-7 align-self-center">
    <label for="dropdownMenuButton">Who Can See?</label>
    </div>
    <div class="dropdown mb-2 col-4 align-self-center">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Anyone
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Anyone</a>
            <a class="dropdown-item" href="#">Associate Only</a>
            <a class="dropdown-item" href="#">Associates & Followers</a>
        </div>
    </div>
</div>
<div class="form-group">
    <input type="text" class="form-control" id="exampleTitle" aria-describedby="titleHelp" placeholder="Title/Subject">
</div>
<div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"placeholder="Anything else to add?"></textarea>
</div>
<div class="row">
    <div class="col-8">
        <button type="button" class="btn btn-default" aria-label="Picture" style="width: 50px; height: 50px">
            <img src="{{asset('/assets/camera.svg')}}" class="img-fluid" alt="Picture">
        </button>
        <button type="button" class="btn btn-default" aria-label="Video" style="width: 50px; height: 50px">
            <img src="{{asset('/assets/video-camera.svg')}}" class="img-fluid" alt="Video">
        </button>
        <button type="button" class="btn btn-default" aria-label="Location" style="width: 50px; height: 50px">
            <img src="{{asset('/assets/pin.svg')}}" class="img-fluid" alt="Location">
        </button>
    </div>
    <div class="col-4 align-self-center">
        <button type="button" class="btn btn-link">Cancel</button>
        <button type="submit" class="btn btn-primary">Post</button>
    </div>
</div>