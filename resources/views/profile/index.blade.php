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
                        <div class="col-6">
                            <div class="btn-group" role="group" aria-label="friends and photos">
                                <a href="{{url('/' . $user->UserId . '/friends')}}" class="btn btn-light">Associates {{$user->associates()->count()}}</a>
                                <a href="{{url('/' . $user->UserId . '/followers')}}" class="btn btn-light">Followers</a>
                                <a href="{{url('/' . $user->UserId . '/photos')}}" class="btn btn-light">Photos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 20px">
                    <div class="card-header">BIO</div>

                    <div class="card-body">
                        Description
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="row justify-content-center">
                    <div class="col-md">
                        @foreach ($posts as $post)
                            @component('component.post', ['post' => $post])
                            @endcomponent
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
