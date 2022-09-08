@extends('Admin.layout.master')

@section('content')
    @if (Auth::guard('blogadmin')->user())
        <div class="col-12">
            <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Admin Dashboard</h5>
                        <hr>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    </div>
                </div>
        </div>

    @endif
@stop
