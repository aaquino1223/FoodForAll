@extends('layouts.app')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Select Profile</h1>
        <p class="lead">I want to sign up for my</p>
        <div class="container">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Self</h4>
                    </div>
                    <img class="img-fluid" src="{{asset('assets/user.svg')}}" alt="Self">
                    <div class="card-body">
                        <form action="/register" method="POST" id="self_select"></form>
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary" form="self_select" value="Submit">Select</button>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Business</h4>
                    </div>
                    <img class="img-fluid" src="{{asset('assets/briefcase.svg')}}" alt="business">
                    <div class="card-body">
                        <form action="/register" method="POST" id="business_select"></form>
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary" form="business_select" value="Submit">Select</button>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Non-profit</h4>
                    </div>
                    <img class="img-fluid" src="{{asset('assets/heart.svg')}}" alt="Nonprofit">
                    <div class="card-body">
                        <form action="/register" method="POST" id="nonprofit_select"></form>
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary" form="nonprofit_select" value="Submit">Select</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection