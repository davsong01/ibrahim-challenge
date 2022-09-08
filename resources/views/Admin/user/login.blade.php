@extends('Admin.layout.master')

@section('content')
        <div class="col-12">
            <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Admin Login</h5>
                        <hr>
                        <form method="post" action="{{ route('authenticate') }}" autocomplete="false">
                            @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Emal / Password</label>
                                    <input type="text" class="form-control" autocomplete="false" id="userid" name="userid" placeholder="Enter Email Or Phone To Loging" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" class="form-control" autocomplete="false" id="password" name="password" placeholder="name@example.com" >
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                    </div>
                </div>
        </div>
@stop
