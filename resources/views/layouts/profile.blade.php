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
                                <img class="mr-3 align-self-center ml-3" alt="image">
                                <div class="media-body">
                                    <h4 class="card-title">{{$user->UserName}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-sm-end">
                        <div class="col-5" >
                            <div class="btn-group" role="group" aria-label="profile navigation">
                                @if(auth()->user()->UserId != $user->UserId)
                                    <form method="POST" action="{{url('/profile')}}">
                                        @csrf
                                        
                                        <button class="btn btn-primary" name="Connect">Connect</button>
                                        <button class="btn btn-light" name="Follow">Follow</button>
                                    </form>
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
                                    <a href="{{url('/profile/' . $user->UserId . '/followers')}}" class="btn btn-light">Followers</a>
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
