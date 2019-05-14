@extends('layouts.profile')

@section('profileContent')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="margin-bottom: 20px">
                <div class="card-header">
                    <h4 class="card-title ">Associates</h4>
                </div>
                <div class="card-body">
                    @foreach($user->associates() as $associate)
                        <div class="card m-2">
                            <div class="card-body">
                                <div class="m-2">
                                    <div class="media">
                                        <a href="{{url('/profile/' . $associate->UserId)}}">
                                            <img class="mr-3 align-self-center ml-3 rounded-circle" style="width: 50px; height: 50px"
                                                 alt="image" src="{{isset($associate->multimedia) ?
                                                     'data:' . $associate->multimedia->MimeType . ';base64,' . base64_encode($associate->multimedia->Media) :
                                                     asset('assets/user-purple.svg')}}">
                                        </a>
                                        <div class="media-body">
                                            <p class="card-text m-0">{{$associate->UserName}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
