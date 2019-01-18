@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/user/')}}" class="btn btn-primary">Back to Users</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Add a new user</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/user')}}">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="pass" value="add">
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" value="123456">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
