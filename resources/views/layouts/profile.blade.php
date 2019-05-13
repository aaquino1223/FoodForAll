@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <div class="card">
                    <div class="bg-dark text-white"  style="height: 10em">
                        <img class="card-img"  >
                        <div class="row card-img-overlay mb-4">
                            <div class="media col align-self-end">
                                @if(auth()->user()->UserId == $user->UserId)
                                    <a href="#" data-toggle="modal" data-target="#uploadProfilePic">
                                @endif
                                    <img class="mr-3 align-self-center ml-3 rounded-circle" style="width: 75px; height: 75px"
                                         alt="image" src="{{isset($user->multimedia) ?
                                         'data:' . $user->multimedia->MimeType . ';base64,' . base64_encode($user->multimedia->Media) :
                                         asset('assets/user-purple.svg')}}">
                                @if(auth()->user()->UserId == $user->UserId)
                                    </a>
                                @endif
                                <div class="media-body">
                                    <h4 class="card-title m-0">{{$user->UserName}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="uploadProfilePic" tabindex="-1" role="dialog" aria-labelledby="uploadProfilePic" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="card">
                                    <div class="card-header"><h5 class="card-title m-0">Editing Profile Picture</h5></div>
                                    <div class="card-body">
                                        <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="profilePicControlFile">Upload Profile Picture</label>
                                                <input type="file" name="profileImage" class="form-control-file" accept="image/*" id="profilePicControlFile">
                                            </div>
                                            <div class="row col-5 float-right">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Upload') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-sm-end">
                        <div class="col-5" >
                            <div class="btn-group" role="group" aria-label="profile navigation">
                                @if(auth()->user()->UserId != $user->UserId)
                                    @if($association == null)
                                        <form method="POST" action="{{url('/profile/' . $user->UserId . '/associates')}}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" name="submit" value="Connect">Connect</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{url('/profile/' . $user->UserId . '/associates')}}">
                                            @csrf
                                            @method('PUT')
                                                @if($association->Accepted)
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" value="Connected" role="button"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                                v-pre>{{$association->associateType->Description}} &#10004;</button><span class="caret"></span>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="connectedDropdown">
                                                            <button type="submit" class="dropdown-item" name="submit" value="Unassociate">Unassociate</button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" value="Pending" role="button"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Pending</button><span class="caret"></span>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingDropdown">
                                                                @if($association->RequesterId == auth()->user()->UserId)
                                                                    <button type="submit" class="dropdown-item" name="submit" value="DeleteRequest">Delete Request</button>
                                                                @elseif($association->RequesterId == $user->UserId)
                                                                    <button type="submit" class="dropdown-item" name="submit" value="Accept">Accept</button>
                                                                    <button type="submit" class="dropdown-item" name="submit" value="Decline">Decline</button>
                                                                @endif

                                                        </div>
                                                    </div>
                                                @endif
                                        </form>
                                    @endif
                                    @if($follower == null)
                                        <form method="POST" action="{{url('/profile/' . $user->UserId . '/followers')}}">
                                            @csrf

                                            <button class="btn btn-light" name="submit" value="Follow">Follow</button>
                                        </form>
                                    @else
                                        <button class="btn btn-light" name="submit" value="Connected">Following &#10004;</button>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-6" >
                            <div class="btn-group" role="group" aria-label="profile navigation">
                                @if(auth()->user()->UserId == $user->UserId)
                                    <a href="{{url('/profile')}}" class="btn btn-light">Timeline</a>
                                    <a href="{{url('/profile/' . $user->UserId . '/associates')}}" class="btn btn-light">Associates <label class="m-0 ml-2">{{$user->associates()->count()}}</label></a>
                                    <a href="{{url('/profile/' . $user->UserId . '/followers')}}" class="btn btn-light">Followers <label class="m-0 ml-2">{{$user->followers()->count()}}</label></a>
                                    <a href="{{url('/profile/' . $user->UserId . '/photos')}}" class="btn btn-light">Photos</a>
                                @else
                                    <a href="{{url('/profile/' . $user->UserId)}}" class="btn btn-light">Timeline</a>
                                    <a href="{{url('/profile/' . $user->UserId . '/associates')}}" class="btn btn-light">Associates <label class="m-0 ml-2">{{$user->followers()->count()}}</label></a>
                                    <a href="{{url('/profile/' . $user->UserId . '/followers')}}" class="btn btn-light">Followers <label class="m-0 ml-2">{{$user->followers()->count()}}</label></a>
                                    <a href="{{url('/profile/' . $user->UserId . '/photos')}}" class="btn btn-light">Photos</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('profileContent')
    </div>
@endsection
