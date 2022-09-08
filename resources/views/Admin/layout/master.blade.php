<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
<body>
<nav class="navbar" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand">Kenny Toks</a>
    @if (Auth::guard('blogadmin')->user())
      <a class="btn btn-outline-warning d-flex" href="{{ route('logout') }}" type="submit">Logout</a>
    @else
    <a class="btn btn-outline-success d-flex" href="{{ route('login') }}" type="submit">Login</a>
    @endif
    
  </div>
</nav>
<div class="container mb-3">
  <div class="row">
    <div class="col-md-4">
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Menu</h5>
                <hr>
                <a href="{{ route('createadmin') }}"><p class="card-text">Create Admin</p></a>
                <a href="{{ route('alladmin') }}"><p class="card-text">View Admin</p></a>
                <a href="{{ route('allpost') }}"><p class="card-text">View Post</p></a>
                <a href="{{ route('mypost') }}"><p class="card-text">View My Post</p></a>
            </div>
        </div>
    </div>  
    <div class="col-md-8">
      @if(\Session::has('error'))
        <div class="alert alert-danger">
          {{\Session::get('error')}}
        </div>
      @endif
        @yield('content')
    </div>  
  </div>
</div>
