@extends('layouts.search')

@section('searchContent')
    <div class="row justify-content-center">
        <div class="col-12">
            @foreach($people as $person)
                <div class="card" style="margin-bottom: 20px">
                    <div class="card-body">
                        <div class="card m-2">
                            <div class="card-body">
                                <div class="m-2">
                                    <div class="media">
                                        <a href="{{url('/profile/' . $person->UserId)}}">
                                            <img class="mr-3 align-self-center ml-3 rounded-circle" style="width: 50px; height: 50px"
                                                 alt="image" src="{{isset($person->multimedia) ?
                                             'data:' . $person->multimedia->MimeType . ';base64,' . base64_encode($person->multimedia->Media) :
                                             asset('assets/user-purple.svg')}}">
                                        </a>
                                        <div class="media-body">
                                            <p class="card-text m-0">{{$person->UserName}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection