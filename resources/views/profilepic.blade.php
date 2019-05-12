@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Complete Your Profile') }}</div>
                    <div-- class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload Profile Picture</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        <!--div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            <!--must add javascript to preview image-->
                        <!--/div-->
                            <div class="row col-4 float-right">
                                <button type="button" class="btn btn-link">Skip</button>
                                <button type="submit" class="btn btn-primary">
                                {{ __('Done') }}
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection