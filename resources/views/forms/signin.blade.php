@extends('master')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Signin page</h1>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{url('user/userValidate')}}">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="pass" value="add">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
            </form>
        </div> 
    </div>
    @endsection
</div>