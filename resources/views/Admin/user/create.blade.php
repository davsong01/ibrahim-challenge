@extends('Admin.layout.master')

@section('content')
<div class="col-12">
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Create Admin</h5>
            <hr>
            <form method="post" action="{{ route('store') }}" autocomplete="false">
            @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" autocomplete="false" id="name" name="name" placeholder="name" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" autocomplete="false" id="email" name="email" placeholder="name@example.com" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" autocomplete="false" id="phone" name="phone" placeholder="07012345678" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="password" class="form-control" autocomplete="false" id="password" name="password" placeholder="*****" >
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
