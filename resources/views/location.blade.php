@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Complete Your Profile') }}</div>
            <div class="card-body">
                <!--add form-->

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('address') }}" required autocomplete="address" autofocus>
                    </div>
                    <div class="row col-4 float-right">
                        <button type="button" class="btn btn-link">Skip</button>
                        <button type="submit" class="btn btn-primary">
                        {{ __('Next') }}
                    </div>
                    <!--div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn btn-link">Skip</button>
                            <button type="submit" class="btn btn-primary">
                            {{ __('Next') }}
                        </div>
                    </div-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection