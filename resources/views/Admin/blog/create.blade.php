@extends('Admin.layout.master')

@section('content')
<div class="col-12">
    <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Create Post</h5>
                <hr>
                <form method="post" action="{{ route('create.blog') }}" autocomplete="false">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" autocomplete="false" id="title" name="title" placeholder="Blog Title" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Content</label>
                        <input type="text" class="form-control" autocomplete="false" id="phone" name="phone" placeholder="07012345678" >
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
</div>
@stop
