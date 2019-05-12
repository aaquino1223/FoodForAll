@extends('layouts.profile')

@section('profileContent')
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
@endsection
