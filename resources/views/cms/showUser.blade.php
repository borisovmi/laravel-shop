@extends('cms.master')
@section('content')


<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/user/create')}}" class="btn btn-primary">Add new user</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12 text-center ">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-sliders-h"></i>
                    User</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    <th>Orders</th>
                                </tr>
                            </thead>
                            <tfoot>                                
                                <tr>
                                    <th>User ID</th>
                                    <th>First name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    <th>Orders</th>
                                </tr>                                
                            </tfoot>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['first_name']}}</td>
                                    <td>{{$user['last_name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td><a href="{{url("cms/user/{$user['id']}/edit")}}" type="text" class="btn btn-primary">Update</a></td>
                                    <td><a href="{{url("cms/user/{$user['id']}")}}" type="text" class="btn btn-danger">Delete</a></td>
                                    <td><a href="{{url("cms/user/{$user['id']}/orders")}}" type="text" class="btn btn-success">Orders</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
    </div>
</div>
@endsection
</div>