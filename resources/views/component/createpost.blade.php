<form>
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-donation-tab" data-toggle="pill" href="#pills-donation" role="tab" aria-controls="pills-donation" aria-selected="true">Donation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-event-tab" data-toggle="pill" href="#pills-event" role="tab" aria-controls="pills-event" aria-selected="false">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-help-tab" data-toggle="pill" href="#pills-help" role="tab" aria-controls="pills-help" aria-selected="false">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-other-tab" data-toggle="pill" href="#pills-other" role="tab" aria-controls="pills-other" aria-selected="false">Other</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-donation" role="tabpanel" aria-labelledby="pills-donation-tab">
                        <form method="POST" action="{{url('/post/create')}}">
                            @csrf
                            <div id="donationForm">
                            </div>
                        </form>
{{--                        @component('component.donationform')--}}
{{--                        @endcomponent--}}
                            <!--div class="card bg-light mb-3" style="max-width: 36rem">
                                <div class="card-header">Food Item #1
                                    <button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="fooditem" aria-describedby="whichfood" placeholder="Which food item are you donating?">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" min="1" class="form-control" id="fooditem" aria-describedby="howmany" placeholder="How many?">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="fooditem" aria-describedby="whatmeasure" placeholder="In what measure? e.g. servings, oz, lbs">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-8">
                        <button type="button" class="btn btn-default" aria-label="Add" style="width: 50px; height: 50px">
                            <img src="{{asset('/assets/adding.svg')}}" class="img-fluid" alt="Add">
                        </button>
                            </div>
                            <div class="col-4 align-self-center">
                        <button type="button" class="btn btn-link">Cancel</button>
                        <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div-->
                    </div>
                    <div class="tab-pane fade" id="pills-event" role="tabpanel" aria-labelledby="pills-event-tab">
                        @component('component.postform')
                        @endcomponent
                    </div>
                    <div class="tab-pane fade" id="pills-help" role="tabpanel" aria-labelledby="pills-help-tab">
                        @component('component.postform')
                        @endcomponent
                    </div>
                    <div class="tab-pane fade" id="pills-other" role="tabpanel" aria-labelledby="pills-other-tab">
                        @component('component.postform')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
</div>
</form>