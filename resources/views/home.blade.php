@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
                @component('component.post', ['post' => $post])
                @endcomponent
            @endforeach
        </div>
    </div>
</div>
@endsection
