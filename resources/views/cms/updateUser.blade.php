@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/user/')}}" class="btn btn-primary">Back to Users</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Update user details</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/user/'.$user['id'])}}">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="pass" value="update">
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" name="first_name" value="{{$user['first_name']}}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" name="last_name" value="{{$user['last_name']}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$user['email']}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control text-muted" name="password" placeholder="Don't touch this field if do not need to change the password">
                    <small id="emailHelp" class="form-text text-muted">If you change password - it should be min 6 and max 12 characters</small>

                </div>

                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
