@extends('layouts.search')

@section('searchContent')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($posts as $post)
                @component('component.post', ['post' => $post])
                @endcomponent
            @endforeach
        </div>
    </div>
@endsection
