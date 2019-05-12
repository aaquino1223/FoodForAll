@extends('layouts.profile')

@section('profileContent')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="margin-bottom: 20px">
                <div class="card-header">
                    <h4 class="card-title ">Followers</h4>
                </div>
                <div class="card-body">
                    @foreach($user->followers() as $follower)
                        <div class="card m-2">
                            <div class="card-body">
                                <div class="m-2">
                                    <h5 class="card-text">{{$follower->UserName}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
