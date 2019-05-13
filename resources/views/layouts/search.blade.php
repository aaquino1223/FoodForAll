@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <div class="card">
                    <div class="row justify-content-sm-end">
                        <div class="col-5" >
                            <div class="btn-group" role="group" aria-label="search navigation">
                                <a class="btn btn-light"
                                   href="{{url('/search' . (isset($searchTerm) ? '?searchTerm=' . $searchTerm : ''))}}" >Posts</a>
                                <a class="btn btn-light"
                                   href="{{url('/search?searchType=people' . (isset($searchTerm) ? '&searchTerm=' . $searchTerm : ''))}}">People</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('searchContent')
    </div>
@endsection