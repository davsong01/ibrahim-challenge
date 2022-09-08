@extends('Admin.layout.master')

@section('content')
<div class="col-12">
    <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">All Admin</h5>
                <hr>
               <table class="table table-striped">
                 <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    @foreach ($users as $user)
                        <tr>
                        <td>{{ $counter ++ }}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->phone }} </td>
                        <td><button type="submit" class="btn btn-sm btn-primary">Edit</button></td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
</div>
@stop
