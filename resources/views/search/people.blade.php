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
                                    <h5 class="card-text">{{$person->UserName}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection