@extends('layout.master')

@section('content')
<div class="container mb-3">
        <div class="row mb-3">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text">Created By: {{ $post->blogadmin->name }}</p>
                        <p class="card-text">Created On: {{ $post->blogadmin->created_at}}</p>
                        
                    </div>
                </div>
            @endforeach
        </div>  
          
    </div>

        
</div>
@endsection