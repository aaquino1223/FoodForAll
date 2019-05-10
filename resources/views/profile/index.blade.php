@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4" >
            <div class="col">
                <div class="card">
                    <div class="card bg-dark text-white">
                        <img class="card-img" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text">Last updated 3 mins ago</p>
                        </div>
                    </div>
                    <div class="row justify-content-sm-end">
                        <div class="col-6">
                            <div class="btn-group" role="group" aria-label="friends and photos">
                                <a href="{{url('/' . $user->UserId . '/friends')}}" class="btn btn-light">Associates</a>
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
